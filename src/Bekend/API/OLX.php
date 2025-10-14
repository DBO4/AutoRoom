<?php

// Dozvoli CORS samo sa frontenda (ili sa *)
header("Access-Control-Allow-Origin: http://localhost:5173");

// Omogući sve metode koje koristiš
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Dozvoli potrebna zaglavlja – ovdje NE uključuješ 'access-control-allow-origin'
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Ako je OPTIONS zahtjev, samo odgovori i izađi
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Ako nije OPTIONS, idi dalje i pozovi OLX API
header('Content-Type: application/json');

$apiUrl = 'https://api.olx.ba/users/Auto_Room_Pd/listings';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(['error' => curl_error($ch)]);
} elseif ($http_code !== 200) {
    http_response_code($http_code);
    echo json_encode(['error' => 'OLX API returned HTTP ' . $http_code]);
} else {
    echo $response;
}

curl_close($ch);
?>
