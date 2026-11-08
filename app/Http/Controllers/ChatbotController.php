<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function ask(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $apiKey = config('services.gemini.key');
        $userMessage = $request->input('message');

        // Clinic System Prompt 
        $systemPrompt = "You are an AI assistant for Family Care Medical Center & Pharmacy clinic. Answer patient queries politely and concisely in Sinhala or English.";

        try {
            $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $systemPrompt . "\nUser: " . $userMessage]
                        ]
                    ]
                ]
            ]);
