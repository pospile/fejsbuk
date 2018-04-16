<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './../vendor/autoload.php';


class Mail
{
    function SendMail($to, $subject, $body) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp-167478.m78.wedos.net';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'fejsbuk@underholding.cz';               // SMTP username
            $mail->Password = '25791998aA+';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('fejsbuk@underholding.cz', 'Fejsbuk no-reply');
            $mail->addAddress($to);               // Name is optional

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = 'Prosím změntě svůj emailový klient, tento není podporován.';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}