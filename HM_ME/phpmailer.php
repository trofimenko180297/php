<?php
require ('vendor/autoload.php');

function sendMail($subject, $text, $email = 'trofimenko180297@ukr.net', $email_name = 'test message')
{
    $mail = new PHPMailer();
    //config
    $mail->isSMTP();
    $mail->Host = 'smtp.ukr.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'trofimenko1897@ukr.net';
    $mail->Password = 'secret';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    //mail
    $mail->setFrom('trofimenko1897@ukr.net','test');
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $text;
    $mail->send();

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}
sendMail('test','test');

