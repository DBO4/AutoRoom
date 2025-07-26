<?php
header('Access-Control-Allow-Origin: *');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$email = $_GET['email'];
$brtel = $_GET['brtel'];
$kanal = $_GET['kanal'];
$brend = $_GET['brend'];
$vel = $_GET['vel'];
$rupa = $_GET['rupa'];
$promjer = $_GET['promjer'];
$nap = $_GET['nap'];
$prefKanal = "";

$tekst = "Ponuda zatražena za Feluge<br><br>Podaci:<br>"
. "Brend: " . $brend . "<br>Veličina feluge R: " . $vel . "<br>Broj rupa: " . $rupa . "<br>Promjer rupa: " . $promjer .
"<br>Napomena: " . $nap . 
"<br>Kontakt: " . $kanal . " - ";

if ($kanal == "email"){
    $tekst = $tekst . $email;
} else {
    $tekst = $tekst . $brtel;
}

include "..\mejl.php";

?>