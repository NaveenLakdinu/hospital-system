<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function ask(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        $apiKey = config('services.gemini.key');
        $model = config('services.gemini.model', 'gemini-3.8-flash');

        if (empty($apiKey)) {
            return response()->json([
                'reply' => 'Gemini API Key එක සකසා නොමැත.'
            ], 500);
        }

        $systemPrompt = '
            You are the AI assistant for Family Care Medical Center & Pharmacy.

            Reply in Sinhala when the patient uses Sinhala.
            Reply in English when the patient uses English.
            Be polite, friendly and helpful.
            Give short and clear answers.
            Never invent clinic information.
            Never provide a definite medical diagnosis.
            Never prescribe medicines or dosages.
            Recommend a qualified doctor for medical concerns.
            For emergencies, advise immediate medical attention.
        ';

        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent";

        try {

            $response = Http::withHeaders([
                    'x-goog-api-key' => $apiKey,
                ])
                ->acceptJson()
                ->connectTimeout(10)
                ->timeout(25)
                ->retry(1, 1100, throw: false)
                ->post($url, [
                    'systemInstruction' => [
                        'parts' => [
                            ['text' => $systemPrompt]
                        ]
                    ],
                    'contents' => [
                        [
                            'role' => 'user',
                            'parts' => [
                                ['text' => $validated['message']]
                            ]
                        ]
                    ],
                    'generationConfig' => [
                        'temperature' => 0.4,
                        'maxOutputTokens' => 500,
                    ],
                ]);

            if (!$response->successful()) {

                $status = $response->status();

                $error = $response->json('error.message')
                    ?? 'Unknown Gemini API error';

                Log::error('Gemini API Error', [
                    'status' => $status,
                    'error' => $error,
                    'model' => $model,
                ]);

                if ($status === 429 || $status === 503) {
                    return response()->json([
                        'reply' => 'AI සේවාව මේ මොහොතේ කාර්යබහුලයි. කරුණාකර තත්පර කිහිපයකින් නැවත උත්සාහ කරන්න.'
                    ], 503);
                }

                return response()->json([
                    'reply' => 'Gemini API Error: ' . $error
                ], 500);
            }

            $reply = $response->json(
                'candidates.0.content.parts.0.text'
            );

            if (empty($reply)) {
                Log::warning('Gemini returned empty response', [
                    'model' => $model,
                ]);

                return response()->json([
                    'reply' => 'සමාවන්න, දැනට පිළිතුරක් ලබාගැනීමට නොහැකි විය.'
                ], 500);
            }

            return response()->json([
                'reply' => $reply
            ]);

        } catch (\Throwable $e) {

            Log::error('Chatbot Exception', [
                'error' => $e->getMessage(),
                'model' => $model,
            ]);

            return response()->json([
                'reply' => 'AI සේවාව සමඟ සම්බන්ධ වීමේ ගැටලුවක් ඇත. කරුණාකර නැවත උත්සාහ කරන්න.'
            ], 500);
        }
    }
}
