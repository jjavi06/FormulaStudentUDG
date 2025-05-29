<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KRM78JZB');
    </script>
    <!-- End Google Tag Manager -->
    <!-- FAVICON (Icono página) -->
    <link rel="icon" type="image/png" href="/racingdivision/img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/racingdivision/img/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/racingdivision/img/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/racingdivision/img/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/racingdivision/img/favicon/site.webmanifest" />
    <!-- Fin favicon -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsors&Collaborators</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/racingdivision/css/style.css">
    <link rel="stylesheet" href="/racingdivision/css/sponsors&collaborators.css">
    <link rel="stylesheet" href="/racingdivision/css/formulario.css">
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRM78JZB"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
            <li><select id="language-select-mobile" class="lang-sel-mobile">
                <option value="es">ES</option>
                <option value="ca">CA</option>
                <option value="en">EN</option>
            </select></li>
            <li><a href="/racingdivision/index.html" data-i18n="sponsors.home">Home</a></li>
            <li><a href="/racingdivision/sections/aboutUs.html" data-i18n="sponsors.aboutUs">About Us</a></li>
            <li><a href="/racingdivision/sections/sponsors&collaborators.php" data-i18n="sponsors.sponsors">Sponsors &<br>Collaborators</a></li>
            <li><a href="/racingdivision/sections/news.html" data-i18n="sponsors.news">News</a></li>
            <li><a href="/racingdivision/sections/contacto.php" data-i18n="sponsors.contact">Get In Touch</a></li>
            <img src="/racingdivision/img/logo-blanco.png" alt="">
        </ul>
    </div>
    <!--MENÚ DE NAVEGACIÓN-->
    <nav class="menu">
        <ul class="nav-links">
            <li><a href="/racingdivision/index.html" data-i18n="sponsors.home">Home</a></li>
            <li><a href="/racingdivision/sections/aboutUs.html" data-i18n="sponsors.aboutUs">About Us</a></li>
            <li><a href="/racingdivision/sections/sponsors&collaborators.php" data-i18n="sponsors.sponsors">Sponsors & Collaborators</a></li>
            <li><a href="/racingdivision/sections/news.html" data-i18n="sponsors.news">News</a></li>
            <li><a href="/racingdivision/sections/contacto.php" data-i18n="sponsors.contact">Get In Touch</a></li>
            <select id="language-select-pc" class="lang-sel-pc">
                <option value="es">ES</option>
                <option value="ca">CA</option>
                <option value="en">EN</option>
            </select>
        </ul>
    </nav>
    <!--CONTENIDO CENTRAL-->
    <section>
        <article id="sponsors">
            <div>
                <a href="https://www.eic.cat/" target="_blank"><img src="/racingdivision/img/eic-logo-azul.jpg"></a>
                <a href="https://patronateps.udg.edu/" target="_blank"><img src="/racingdivision/img/patronat.png"></a>
                <a href="https://www.udg.edu/ca/" target="_blank"><img src="/racingdivision/img/udg-logo.png"></a>
            </div>
        </article>
        <article id="help-us">
            <h2 data-i18n="sponsors.title1">Help us build our race car!</h2>
            <p data-i18n="sponsors.p1">As a non-profit organization, at UdG Racing Division we are looking for sponsors to support our project and help us build the best race car to compete in Formula Student Spain.</p>
            <p data-i18n="sponsors.p2">After several years of inactivity, we’re back—stronger and more motivated than ever.</p>
            <p data-i18n="sponsors.p3">We’re ready to give it our all.</p>
            <p class="cry-for-help"><b data-i18n="sponsors.p4">Help us make it happen!</b></p>
        </article>
        <article>
            <form id="contact-form" method="POST" action="/racingdivision/php/enviar.php">
                <label for="nombreContacto" id="lblNombre" data-i18n="sponsors.formName">Name*</label>
                <input name="name" type="text" id="nombreContacto" class="entrada-simple" required>
                <label for="correoContacto" id="lblCorreo" data-i18n="sponsors.formEmail">Email*</label>
                <input name="email" type="email" id="correoContacto" class="entrada-simple" required>
                <label for="subject" id="lblSubject" data-i18n="sponsors.formSubject">Subject*</label>
                <select name="subject" id="subject" required>
                    <option value="" data-i18n="sponsors.formOp1">--Select a Subject--</option>
                    <option value="becomeSponsor" data-i18n="sponsors.formOp2">Become a Sponsor</option>
                    <option value="becomeMember" data-i18n="sponsors.formOp3">Become a Member</option>
                    <option value="haveQuestions" data-i18n="sponsors.formOp4">I have a question</option>
                </select>
                <label for="organizacion" id="lblOrganizacion" style="display: none;" data-i18n="sponsors.formOrganization">Organization</label>
                <input name="organization" type="text" id="organizacion" class="entrada-simple" style="display: none;">
                <!-- HoneyPot -->
                <input type="text" name="telefono" style="display: none;">
                <label for="mensajeContacto" data-i18n="sponsors.formMessage">Message*</label>
                <textarea name="message" id="mensajeContacto" rows="8" class="entrada-simple" required></textarea>
                <!-- Google reCAPTCHA -->
                <?php
                    require '../php/claves.php';
                    $key = GetCaptchaKeyHtml();
                    echo '<div class="g-recaptcha" data-sitekey="' . $key . '"></div>'
                ?>
                <button type="submit" class="btn-azul" id="sendForm" data-i18n="sponsors.send">Send a Message</button>
            </form>
        </article>
    </section>
    <!--PIE DE PÁGINA-->
    <footer class="pie-pag">
        <div class="contenido-footer" id="footer-general">
            <ul>
                <li><img src="/racingdivision/img/udg-logo.png" class="footer-logo"></li>
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
                <li><a href="/racingdivision/sections/contacto.php" data-i18n="sponsors.contactFooter">Contact</a></li>
                <li><a href="/racingdivision/sections/contacto.php" data-i18n="sponsors.sponsorFooter">Become a Sponsor</a></li>            </ul>
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
    <script src="/racingdivision/scripts/contacto.js"></script>
    <!-- Script para validación de reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>