<?php
function MostrarMensaje(bool $valido, $name = "", $mail = "", $mensaje = ""){
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
        <a href="/racingdivision/index.php" class="logo" id="headerLogo"><img src="/racingdivision/img/logo.png"></a>
        <nav class="navbar">
            <div class="hamburger" id="hamburger">
                <img id="hamburgerImg" src="/racingdivision/img/hamburger-blue.png">
            </div>
        </nav>
    </header>
    <!-- Links del menú hamburguesa -->
    <div class="hamburger-links">
        <ul class="nav-links" id="nav-links">
            <li><a href="/racingdivision/index.php" data-i18n="contactForm.home">Home</a></li>
            <li><a href="/racingdivision/sections/aboutUs.html" data-i18n="contactForm.aboutUs">About Us</a></li>
            <li><a href="/racingdivision/sections/sponsors&collaborators.php" data-i18n="contactForm.sponsors">Sponsors &<br>Collaborators</a></li>
            <li><a href="/racingdivision/sections/news.php" data-i18n="contactForm.news">News</a></li>
            <li><a href="/racingdivision/sections/contacto.php" data-i18n="contactForm.contact">Get In Touch</a></li>
            <img src="/racingdivision/img/logo-blanco.png" alt="">
        </ul>
    </div>
    <!--MENÚ DE NAVEGACIÓN-->
    <nav class="menu">
        <ul class="nav-links">
            <li><a href="/racingdivision/index.php" data-i18n="contactForm.home">Home</a></li>
            <li><a href="/racingdivision/sections/aboutUs.html" data-i18n="contactForm.aboutUs">About Us</a></li>
            <li><a href="/racingdivision/sections/sponsors&collaborators.php" data-i18n="contactForm.sponsors">Sponsors & Collaborators</a></li>
            <li><a href="/racingdivision/sections/news.php" data-i18n="contactForm.news">News</a></li>
            <li><a href="/racingdivision/sections/contacto.php" data-i18n="contactForm.contact">Get In Touch</a></li>
            <select id="language-select-pc" class="lang-sel-pc">
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
// =============================================================================================================================
// Cambiar de noticias, siguiente y anterior
// =============================================================================================================================

require "dbconnection.php";
require_once "claseNoticia.php";

// Buscar siguiente noticia
function SiguienteNoticia($id, $idioma): ?Noticia{
    global $conn;

    $SQL = '(
        select * from noticias
        where id > :id and lang = :lang
        order by id asc
        limit 1
        )
        UNION ALL
        (
        -- Si la anterior no devuelve nada (no hay id >), busca la primera noticia del idioma
        select * from noticias
        where lang = :lang
        order by id asc
        limit 1
        )
        limit 1';
    $rst = $conn -> prepare($SQL);
    $rst -> bindParam(":id", $id);
    $rst -> bindParam(":lang", $idioma);
    $rst -> execute();
    $rst -> setFetchMode(PDO::FETCH_CLASS, "Noticia");
    $actualNews = $rst -> fetch();
    return $actualNews ?: null;
}

// Buscar noticia anterior
function AnteriorNoticia($id, $idioma): ?Noticia{
    global $conn;

    $SQL = '(
        -- 1. Intenta encontrar la noticia con ID inmediatamente menor
        select * from noticias
        where id < :id and lang = :lang
        order by id desc
        limit 1
        )
        UNION ALL
        (
        -- 2. Si la anterior no existe, devuelve la noticia con el ID MÁXIMO (última noticia)
        select * from noticias
        where lang = :lang
        order by id desc
        limit 1
        )
        limit 1';

    $rst = $conn -> prepare($SQL);
    $rst -> bindParam(":id", $id);
    $rst -> bindParam(":lang", $idioma);
    $rst -> execute();
    $rst -> setFetchMode(PDO::FETCH_CLASS, "Noticia"); 
    $actualNews = $rst -> fetch();

    return $actualNews ?: null;
}
?>