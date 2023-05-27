<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $to = 'boualemsasfi@gmail.com'; //mon email
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (mail($to, $subject, $message, $headers)) {
      echo "Email envoyé avec success .";
    } else {
      echo "Echec de l'envoie, veuillez réesayer svp !.";
    }
  } else {
    echo "Votre adresse email est invalide, veuillez réesayer svp !.";
  }
}
?>
