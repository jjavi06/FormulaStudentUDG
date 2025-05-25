<?php
session_start();
require '../vendor/autoload.php';
  require 'claves.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// ======================== VALIDACIÓN RECAPTCHA =====================
// Clave secreta de reCAPTCHA
$secret = GetCaptchaKeyPhp(); 
// Respuesta que se envía desde el formulario
$response = $_POST['g-recaptcha-response'];
// Verifica con Google
$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
// Decodifica el JSON
$captcha_success = json_decode($verify);
// Validación
if (!$captcha_success->success) {
    die("Captcha inválido. Intenta de nuevo.");
}

// ================= VALIDACIÓN POR IP (Solo se permite un envio por minuto) ================
if (!isset($_SESSION['ultimo_envio'])) {
  $_SESSION['ultimo_envio'] = time();
} else {
  $tiempo_entre_envios = time() - $_SESSION['ultimo_envio'];
  if ($tiempo_entre_envios < 60) {
    die(MostrarMensaje("", "", "", false));
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
$organization = isset($_POST['organization']) ? trim($_POST['organization']) : '';
$mensaje = isset($_POST['message']) ? trim($_POST['message']) : '';

// ========== Configurar PHPMailer ==========
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = GetAppPasswordUser();
    $mail->Password = GetAppPasswordKey();
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
    if($organization == ""){
      $mail->Body    = "
        <p><strong>Name:</strong> {$nombre}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong><br>{$mensaje}</p>
      ";
    }
    else{
        $mail->Body    = "
        <p><strong>Name:</strong> {$nombre}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Organization:</strong> {$organization}</p>
        <p><strong>Message:</strong><br>{$mensaje}</p>
      ";
    }

    $mail->send();
    $valido = true;
    MostrarMensaje($nombre, $email, $mensaje, $valido);
} catch (Exception) {
    $valido = false;
    MostrarMensaje("", "", "", $valido);
}
function MostrarMensaje($name = "", $mail = "", $mensaje = "", bool $valido){
  echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- FAVICON (Icono página) -->
    <link rel="icon" type="image/png" href="/racingdivision/img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/racingdivision/img/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/racingdivision/img/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/racingdivision/img/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/racingdivision/img/favicon/site.webmanifest" />
    <!-- Fin favicon -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get In Touch</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/racingdivision/css/style.css">
    <link rel="stylesheet" href="/racingdivision/css/mensaje.css">
</head>
<body>
    <!--CABECERA DE LA PÁGINA-->
    <header>
        <img src="/racingdivision/img/coche-header.png" class="logo, carLogo" id="headerCar">
        <a href="/racingdivision/index.html" class="logo" id="headerLogo"><img src="/racingdivision/img/logo.png"></a>
        <nav class="navbar">
            <div class="hamburger" id="hamburger">
                <img id="hamburgerImg" src="/racingdivision/img/hamburger-blue.png">
            </div>
        </nav>
    </header>
    <!-- Links del menú hamburguesa -->
    <div class="hamburger-links">
        <ul class="nav-links" id="nav-links">
            <li><a href="/racingdivision/index.html" data-i18n="contactForm.home">Home</a></li>
            <li><a href="/racingdivision/sections/aboutUs.html" data-i18n="contactForm.aboutUs">About Us</a></li>
            <li><a href="/racingdivision/sections/sponsors&collaborators.php" data-i18n="contactForm.sponsors">Sponsors &<br>Collaborators</a></li>
            <li><a href="/racingdivision/sections/news.html" data-i18n="contactForm.news">News</a></li>
            <li><a href="/racingdivision/sections/contacto.php" data-i18n="contactForm.contact">Get In Touch</a></li>
            <img src="/racingdivision/img/logo-blanco.png" alt="">
        </ul>
    </div>
    <!--MENÚ DE NAVEGACIÓN-->
    <nav class="menu">
        <ul class="nav-links">
            <li><a href="/racingdivision/index.html" data-i18n="contactForm.home">Home</a></li>
            <li><a href="/racingdivision/sections/aboutUs.html" data-i18n="contactForm.aboutUs">About Us</a></li>
            <li><a href="/racingdivision/sections/sponsors&collaborators.php" data-i18n="contactForm.sponsors">Sponsors & Collaborators</a></li>
            <li><a href="/racingdivision/sections/news.html" data-i18n="contactForm.news">News</a></li>
            <li><a href="/racingdivision/sections/contacto.php" data-i18n="contactForm.contact">Get In Touch</a></li>
            <select id="language-select">
                <option value="es">ES</option>
                <option value="ca">CA</option>
                <option value="en">EN</option>
            </select>
        </ul>
    </nav>
    <!--CONTENIDO CENTRAL-->
    <section class="contenedor-mensaje">
        <article class="estado-mensaje">';
  if($valido){
    echo '
            <h3 data-i18n="mensaje.estadoValido"></h3>
        </article>
        <article>
            <p><b data-i18n="mensaje.nombre"></b>' . $name . '</p>
            <p><b data-i18n="mensaje.email"></b>' . $mail . '</p>
            <p><b data-i18n="mensaje.mensaje"></b><br>' . $mensaje . '</p>
        </article>
    </section>';
  }
  else{
    echo '
            <h3 data-i18n="mensaje.estadoError"></h3>
        </article>
    </section>';
  }
  echo '    
  <!--PIE DE PÁGINA-->
    <footer class="pie-pag">
        <div class="contenido-footer" id="footer-general">
            <ul>
                <li><img src="/racingdivision/img/blue-udg-logo.png" class="footer-logo"></li>
            </ul>
            <ul>
                <li>C/ Maria Aurèlia Capmany i</li>
                <li>Farnés Nº 61</li>
                <li>17003 Girona</li>
            </ul>
            <ul>
                <li><img src="/racingdivision/img/insta-logo.png" class="icono-footer"><a href="https://www.instagram.com/udgracingdivision/" target="_blank"> Instagram</a></li>
                <li><img src="/racingdivision/img/tiktok-logo.png" class="icono-footer"><a href="https://www.tiktok.com/@udgracingdivision" target="_blank"> TikTok</a></li>
                <li><img src="/racingdivision/img/linkedin-logo.png" class="icono-footer"><a href="https://www.linkedin.com/company/udg-racing-division-1/" target="_blank">Linkedin</a></li>
            </ul>
            <ul>
                <li>info@udgracingdivision.cat</li>
                <li><a href="/racingdivision/sections/contacto.php" data-i18n="contactForm.contactFooter">Contact</a></li>
                <li><a href="/racingdivision/sections/contacto.php" data-i18n="contactForm.sponsorFooter">Become a Sponsor</a></li>            </ul>
        </div>
        <!-- footer movil -->
        <div id="footer-movil">
            <ul class="iconos-movil">
                <li><a href="https://www.instagram.com/udgracingdivision/" target="_blank"><img src="/racingdivision/img/insta-logo.png" class="icono-footer"></a></li>
                <li><a href="https://www.tiktok.com/@udgracingdivision" target="_blank"><img src="/racingdivision/img/tiktok-logo.png" class="icono-footer"></a></li>
                <li><a href="https://www.linkedin.com/company/udg-racing-division-1/" target="_blank"><img src="/racingdivision/img/linkedin-logo.png" class="icono-footer"></a></li>
                <li><a href="/racingdivision/sections/contacto.php"><img src="/racingdivision/img/phone-logo.png" class="icono-footer"></a></li>
            </ul>
            <div class="contenido-fmovil">
                <a href="https://www.udg.edu/ca/" target="_blank"><img src="/racingdivision/img/udg-small-logo.png" class="small-logo"></a>
                <p>C/ Maria Aurèlia Capmany i Farnés Nº 61, 17003 Girona</p>
            </div>
        </div>
    </footer>
    <div id="createdBy">Created by Javier Granados - Contact: jmelekhov@gmail.com</div>
    <script src="/racingdivision/scripts/script.js"></script>
    <!-- Script para validación de reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>';
}
?>