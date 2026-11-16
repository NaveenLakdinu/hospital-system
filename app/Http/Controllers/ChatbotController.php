
            // Google API එකෙන් එන සැබෑ දෝෂය Log කිරීම සහ පෙන්වීම
            Log::error('Gemini API Error: ' . $response->status() . ' - ' . $response->body());
            $googleError = $response->json('error.message') ?? 'API Error (' . $response->status() . ')';
            $errorMsg = 'AI දෝෂයකි: ' . $googleError;

            return response()->json([
                'reply' => $errorMsg,
                'response' => $errorMsg,
                'answer' => $errorMsg,
                'message' => $errorMsg,
            ], 500);

        } catch (\Exception $e) {
            Log::error('Chatbot Exception: ' . $e->getMessage());
            $errorMsg = 'සම්බන්ධතා දෝෂයකි: ' . $e->getMessage();

            return response()->json([
                'reply' => $errorMsg,
                'response' => $errorMsg,
                'answer' => $errorMsg,
                'message' => $errorMsg,
            ], 500);
        }
    }
}