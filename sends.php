<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'C:\xampp\htdocs\project22\sendmail\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\project22\sendmail\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\project22\sendmail\phpmailer\phpmailer\src\SMTP.php';

if(isset($_POST["send"])){

  $mail = new PHPMailer(true);

  $mail->SMTPDebug=3; // Enable debug logging (optional)

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'mr.aidenashleysayson@gmail.com';  // Replace with your actual email
  $mail->Password = 'Zafhkiel2121'; // Replace with your actual password (use environment variables or config file)
  $mail->SMTPSecure = 'tsl';
  $mail->port = 587;

  $mail->SetFrom= ('mr.aidenashleysayson@gmail.com');

  $mail->addAddress($_POST["email"]);

  $mail->isHTML(true);

  $mail->Subject = $_POST["subject"];
  $mail->Body = $_POST["message"];

  if (!$mail->send()) {
    echo "Error: " . $mail->ErrorInfo;
  } else {
    echo "<script>alert('Sent Successfully');
    document.location.href = 'potato.php';
    </script>";
  }

}

?>
