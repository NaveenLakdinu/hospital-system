<?php
$baseUrl = 'http://127.0.0.1:8000';
$cookieFile = __DIR__ . '/storage/test_cookies2.txt';

// Ensure clean cookie jar
@unlink($cookieFile);

$ch = curl_init($baseUrl . '/login');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => true,
    CURLOPT_COOKIEJAR      => $cookieFile,
    CURLOPT_COOKIEFILE     => $cookieFile,
]);
$response = curl_exec($ch);
curl_close($ch);

preg_match('/name="_token" value="([^"]+)"/', $response, $matches);
$token = $matches[1] ?? null;
echo "Token: " . ($token ? substr($token,0,20).'...' : 'NOT FOUND') . "\n";
echo "Cookie file contents:\n";
echo file_get_contents($cookieFile) . "\n";

// POST with verbose
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
    CURLOPT_VERBOSE        => true,
]);
$out = fopen('php://stderr', 'w');
curl_setopt($ch2, CURLOPT_STDERR, $out);

ob_start();
$postResp = curl_exec($ch2);
$debug = ob_get_clean();

$code = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
curl_close($ch2);
fclose($out);

echo "\nPOST HTTP: $code\n";

// Show response headers only
$headerSize = strlen($postResp) - strlen(strstr($postResp, "\r\n\r\n"));
echo "Response headers:\n" . substr($postResp, 0, $headerSize) . "\n";

@unlink($cookieFile);
