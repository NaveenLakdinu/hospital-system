<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function ask(Request $request)
    {
        $userMessage = $request->input('message')
            ?? $request->input('prompt')
            ?? $request->input('question')
            ?? $request->input('query');

        if (empty(trim((string) $userMessage))) {
            $msg = 'කරුණාකර ඔබගේ පණිවිඩය ඇතුළත් කරන්න.';
            return response()->json([
                'reply' => $msg,
                'response' => $msg,
                'answer' => $msg,
                'message' => $msg,
            ], 422);
        }

        $apiKey = env('GEMINI_API_KEY') ?: config('services.gemini.key');

        if (empty($apiKey)) {
            $msg = '.env ගොනුවේ GEMINI_API_KEY ඇතුළත් කර නොමැත.';
            return response()->json([
                'reply' => $msg,
                'response' => $msg,
                'answer' => $msg,
                'message' => $msg,
            ], 500);
        }

        try {
            $model = env('GEMINI_MODEL', 'gemini-2.5-flash');
            $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

            $systemPrompt = "You are MediCare24 AI Health Assistant, a helpful and polite medical support assistant for MediCare24 Hospital. Answer clearly in the same language the user asks (Sinhala or English). Provide general health guidance and remind patients to consult a qualified MediCare24 doctor for an official diagnosis.";

            $response = Http::withoutVerifying()
                ->timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post($url, [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $systemPrompt . "\n\nPatient Question: " . $userMessage]
                            ]
                        ]
                    ]
                ]);

            if ($response->successful()) {
                $data = $response->json();
               