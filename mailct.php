
<?php 

function mailsct($firstname,$lastname,$message) {
   
require_once 'lib/PHPMailer/PHPMailerAutoload.php';  
 
$mail = new PHPMailer;
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "davidjohnmartindjm@gmail.com";
  $mail->Password = "Starwars12341234";

  //Set who the message is to be sent from
  $mail->setFrom("No-Reply@binrunner.net", "No Reply");
  $mail->addReplyTo('No-Reply@binrunner.net', "No Reply");
  $mail->addAddress("davidjohnmartindjm@gmail.com", "$uname");
  $mail->WordWrap = 50;                                 
  $mail->isHTML(true);                                  
  $mail->Subject = 'INFO';
  $mail->Body    = "$message <br> From $firstname $lastname " ;
  //active.php?id=90&code=67483670
  $mail->AltBody = "$firstname $lastname This is the body in plain text for non-HTML mail clients";

  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      
      //echo "$uname,$email1,$upass,$firstname,$lastname,$random Message has been sent to your email Account inside there is a URL to open to finalise activation";
  
       
      } 
      
  
  
}