<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

require 'PHPMailer-master/src/POP3.php';
require "config/email.php";

function send_mail($sent_to_email,$send_to_name,$subject,$body){
    global $config;
    $config_email=$config["email"];
$mail = new PHPMailer(true);

try {
  $mail->SMTPDebug = 0;                    
  $mail->isSMTP();                                       
  $mail->Host =$config_email['host'];
  $mail->SMTPAuth   = true;                           
  $mail->Username   =  $config_email["username"];//'tl6824054@gmail.com';                  
  $mail->Password     = $config_email['password'];//'evqxovgukjpvgvxf' ;         
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
  $mail->Port       =  $config_email['port'];                               
  $mail->CharSet="UTF-8";  
  $mail->setFrom($config_email["username"], $config_email["fullname"]);
  $mail->addAddress($sent_to_email, $send_to_name);    


  //Attachments
  // them file dinh kem
//   $mail->addAttachment('/var/tmp/file.tar.gz');       
//   $mail->addAttachment('home3.jpg', 'Gato.jpg');   
  // chi can gan ten mang
//   $mail->addAttachment($option);   

  $mail->isHTML(true);                             
  $mail->Subject = $subject;
  $mail->Body= $body;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
// dung khi co noi dung tieng viet 
  $mail->send();
  // echo 'Message has been sent';
} catch (Exception $e) {
  return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}


?>


