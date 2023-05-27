<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $mail = new PHPMailer(true);
  
  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Replace with your SMTP server address
    $mail->Port = 587;  // Replace with the appropriate SMTP port (e.g., 587 for TLS, 465 for SSL)
    $mail->SMTPAuth = true;
    $mail->Username = 'boualemsasfi@gmail.com';  // Replace with your SMTP username
    $mail->Password = 'flehcadjknvkatgx';  // Replace with your SMTP password
    $mail->SMTPSecure = 'tls';  // Replace with the appropriate encryption method (tls or ssl)

    $mail->setFrom($email, $name);
    $mail->addAddress('boualemsasfi@gmail.com');  // Replace with the recipient's email address

    $mail->Subject = $subject;

    // $mail->Body = $message;




    
    // HTML body of the email
    $mail->isHTML(true);
    $mail->Body = '<h1>Message envoyé depuis mon portfolio</h1>' .'<h2>Sujet :'. $subject .'</h2>' . '<h3>Nom :'. $name .'</h3>' . '<h3>Email :'. $email .'</h3>' . '<p>'. $message .'</p>';
    
    // Add an image to the email
    $mail->AddEmbeddedImage('../assets/img/job.jpg', 'my-image', 'job.jpg');

    // Define the image in the HTML body
    $mail->Body .= '<img src="cid:my-image" alt="Job-Image">';




    $mail->send();


    echo '<script>alert("Email envoyé avec success.");</script>';
    echo '<script>window.location.href = "../index.html";</script>'; // Redirect to a specific page after the email is sent
    
    // echo 
    // "<script>
    // alert('l'Email a été envoyé avec success');
    // document.location.href='../index.html'
    // </script>";

  } catch (Exception $e) {
    echo "l'Envoie de l'email a échoué. Erreur: " . $mail->ErrorInfo;
  }
}
?>
