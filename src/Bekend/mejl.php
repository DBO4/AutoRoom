<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
$model = $_GET['model'];
$modelTekst = "";
$prefKanal = "";

if ($model == 0 || $model == "0"){
    $modelTekst = "Gume";
}

$tekst = "Ponuda zatražena za " . $modelTekst . "<br><br>Podaci:<br>"
. "Dimenzije: " . $dimA . "/" . $dimB . "/" . $dimC . " - " . $tip . 
"<br>Napomena: " . $nap . 
"<br>Kontakt: " . $kanal . " - ";

if ($kanal == "email"){
    $tekst = $tekst . $email;
} else {
    $tekst = $tekst . $brtel;
}

echo $tekst;
//echo "AAAAAAAAAA";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function



//Load Composer's autoloader
include ('vendor/autoload.php');


//Create an instance; passing `true` enables exceptions           /*
$mail = new PHPMailer(true);

try {
    
    //Server settings
    $mail->SMTPDebug = 2;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'darioborisevic@gmail.com';                     
    $mail->Password   = 'sedu eoma kacm bjmk';                               
    $mail->SMTPSecure = "tls";         
    $mail->Port       = 587;       

    
    //$mail->addAddress($email, $ime);     //Add a recipient
    $mail->addAddress('darioborisevic@gmail.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Potraznja ponude #421";
    $mail->Body    = $tekst;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header_remove();
    ob_clean();
    echo 'Poruka je uspješno upisana!';
    //echo file_get_contents("index.php");
} catch (Exception $e) {
    echo "Message could not be sent.";
}


?>