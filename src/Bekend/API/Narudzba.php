<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$imePr = $_GET['imePr'];
$brtel = $_GET['brtel'];
$adresa = $_GET['adresa'];
$nap = $_GET['nap'];
$id = $_GET['id'];
$naziv = $_GET['naziv'];
$cijena = $_GET['cijena'];
$prefKanal = "";

$tekst = "NARUDŽBA<br><br>Podaci:<br>" .
"<br>Ime i prezime: " . $imePr . 
"<br>Broj telefona: " . $brtel . 
"<br>Adresa " . $adresa .
"<br>Akcija: " . $id .
"<br>Artikal: " . $naziv .
"<br>Cijena: " . $cijena .
"<br>Napomena: " . $nap;

include "..\mejl.php";

?>