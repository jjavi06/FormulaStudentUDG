<?php
session_start();
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// ======================== VALIDACIÓN RECAPTCHA =====================
// // Clave secreta de reCAPTCHA
// $secret = "recaptcha"; 
// // Respuesta que se envía desde el formulario
// $response = $_POST['g-recaptcha-response'];
// // Verifica con Google
// $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
// // Decodifica el JSON
// $captcha_success = json_decode($verify);
// // Validación
// if (!$captcha_success->success) {
//     die("Captcha inválido. Intenta de nuevo.");
// }

// ================= VALIDACIÓN POR IP (Solo se permite un envio por minuto) ================
if (!isset($_SESSION['ultimo_envio'])) {
  $_SESSION['ultimo_envio'] = time();
} else {
  $tiempo_entre_envios = time() - $_SESSION['ultimo_envio'];
  if ($tiempo_entre_envios < 60) {
    die("Por favor, espera antes de enviar otro mensaje.");
  }
  $_SESSION['ultimo_envio'] = time();
}

// ========== HONEYPOT ==================
//Si el campo teléfono (oculto para los usuarios) tiene contenido, se mata el proceso de envio
if (!empty($_POST['telefono'])) {
  die("Spam detectado.");
}

// ========== Recoger y validar datos del formulario ==========
$nombre  = isset($_POST['name']) ? trim($_POST['name']) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$asunto  = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$mensaje = isset($_POST['message']) ? trim($_POST['message']) : '';

// ========== Configurar PHPMailer ==========
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@udgracingdivision.cat';
    $mail->Password = 'google password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Remitente y destinatario
    $mail->setFrom($email, $nombre);
    $mail->addAddress('info@udgracingdivision.cat', 'Racing Division');

    // Contenido del correo
    switch($asunto){
      case 'becomeSponsor':
        $asunto = 'Become a Sponsor';
        break;
      case 'becomeMember':
        $asunto = 'Become a Member';
        break;
      case 'haveQuestions':
        $asunto = 'I have a question';
        break;
    }
    $mail->isHTML(true);
    $mail->Subject = $asunto ?: 'Nuevo mensaje del formulario';
    $mail->Body    = "
        <p><strong>Name:</strong> {$nombre}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong><br>{$mensaje}</p>
    ";

    $mail->send();
    echo "Mensaje enviado correctamente.";
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error: {$mail->ErrorInfo}";
}
?>