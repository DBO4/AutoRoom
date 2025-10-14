<?php
header('Access-Control-Allow-Origin: *');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$email = $_GET['email'];
$brtel = $_GET['brtel'];
$kanal = $_GET['kanal'];
$oprema = $_GET['oprema'];
$vel = $_GET['vel'];
$nap = $_GET['nap'];
$prefKanal = "";

$tekst = "Ponuda zatražena za Moto opremu<br><br>Podaci:<br>"
. "Oprema: " . $oprema . "<br>Veličina: " . $vel . "<br>" .
"<br>Napomena: " . $nap . 
"<br>Kontakt: " . $kanal . " - ";

if ($kanal == "email"){
    $tekst = $tekst . $email;
} else {
    $tekst = $tekst . $brtel;
}

include "..\mejl.php";

?>