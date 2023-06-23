<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function mailer($email, $username, $subject, $message, $attachments = []){
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->Username = 'educosliit@gmail.com';
    $mail->Password = 'yyumtqzkpwvmruoc';
    $mail->setFrom('educosliit@gmail.com', 'EDUCO');
    $mail->addReplyTo($email, $username);
    $mail->addAddress($email, $username);
    $mail->Subject = $subject;
    $mail->msgHTML($message);
    $mail->AltBody = $message;
    foreach ($attachments as $attachment) {
        $mail->addAttachment($attachment);
    }

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
}