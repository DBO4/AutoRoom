<?php
header('Access-Control-Allow-Origin: *');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$email = $_GET['email'];
$brtel = $_GET['brtel'];
$kanal = $_GET['kanal'];
$dimA = $_GET['dimA'];
$dimB = $_GET['dimB'];
$dimC = $_GET['dimC'];
$tip = $_GET['tip'];
$nap = $_GET['nap'];
$prefKanal = "";

$tekst = "Ponuda zatražena za Gume<br><br>Podaci:<br>"
. "Dimenzije: " . $dimA . "/" . $dimB . "/" . $dimC . " - " . $tip . 
"<br>Napomena: " . $nap . 
"<br>Kontakt: " . $kanal . " - ";

if ($kanal == "email"){
    $tekst = $tekst . $email;
} else {
    $tekst = $tekst . $brtel;
}

include "..\mejl.php";

?>