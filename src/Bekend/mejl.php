<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//echo "AAAAAAAAAA";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


   
    //echo fgets($fajlMejl);
//Load Composer's autoloader
include ('vendor/autoload.php');


//Create an instance; passing `true` enables exceptions           /*
$mail = new PHPMailer(true);

try {
    

    //Server settings
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'darioborisevic@gmail.com';                     
    $mail->Password   = 'sedu eoma kacm bjmk';                               
    $mail->SMTPSecure = "tls";         
    $mail->Port       = 587;       


    //$mail->addAddress($email, $ime);     //Add a recipient
    $mail->addAddress("darioborisevic@gmail.com");               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Potraznja ponude";
    $mail->Body    = $tekst;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo file_get_contents("index.php");
} catch (Exception $e) {
    echo "Message could not be sent.";
}


?>