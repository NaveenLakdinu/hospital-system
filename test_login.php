<?php
// Quick login CSRF test
$baseUrl = 'http://127.0.0.1:8000';
$cookieFile = __DIR__ . '/storage/test_cookies.txt';

// Step 1: GET login page to grab CSRF token + session cookie
$ch = curl_init($baseUrl . '/login');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => true,
    CURLOPT_COOKIEJAR      => $cookieFile,
    CURLOPT_COOKIEFILE     => $cookieFile,
    CURLOPT_FOLLOWLOCATION => false,
]);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

preg_match('/name="_token" value="([^"]+)"/', $response, $matches);
$token = $matches[1] ?? null;

echo "GET /login => HTTP $httpCode\n";
echo "CSRF Token: " . ($token ? substr($token, 0, 20) . '...' : 'NOT FOUND') . "\n\n";

if (!$token) {
    echo "ERROR: Could not find CSRF token in login page!\n";
    exit(1);
}

// Step 2: POST login credentials
$ch2 = curl_init($baseUrl . '/login');
curl_setopt_array($ch2, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => true,
    CURLOPT_COOKIEJAR      => $cookieFile,
    CURLOPT_COOKIEFILE     => $cookieFile,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query([
        '_token'   => $token,
        'email'    => 'pharmacist@familycare.com',
        'password' => 'password123',
    ]),
    CURLOPT_FOLLOWLOCATION => false,
]);
$postResponse = curl_exec($ch2);
$postCode     = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
$location     = curl_getinfo($ch2, CURLINFO_REDIRECT_URL);
curl_close($ch2);

echo "POST /login => HTTP $postCode\n";
echo "Redirect to: " . ($location ?: 'none') . "\n";

if ($postCode === 419) {
    echo "\nSTILL 419 — CSRF verification failing server-side.\n";
} elseif ($postCode === 302) {
    echo "\nSUCCESS — Login redirected!\n";
} else {
    echo "\nUnexpected status.\n";
}

// Cleanup
@unlink($cookieFile);
