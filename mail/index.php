<?php
require("src/PHPMailer.php");
 require("src/SMTP.php");
 require("src/Exception.php");
 require("constants.php");

 $mail = new PHPMailer\PHPMailer\PHPMailer();

try {
   
    $mail->IsSMTP(); // enable SMTP

    //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "robinhossainrabbiz5@gmail.com";
    $mail->Password = PASSWORD;
    $mail->SetFrom("robinhossainrabbiz5@gmail.com");
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   
     $mail->isHTML(true); 
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress($useremail);
     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

 