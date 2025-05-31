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
    <title>News</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/racingdivision/css/style.css">
    <link rel="stylesheet" href="/racingdivision/css/noticias.css">
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRM78JZB"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
            <li><select id="language-select-mobile" class="lang-sel-mobile">
                <option value="es">ES</option>
                <option value="ca">CA</option>
                <option value="en">EN</option>
            </select></li>
            <li><a href="/racingdivision/index.php" data-i18n="news.home">Home</a></li>
            <li><a href="/racingdivision/sections/aboutUs.html" data-i18n="news.aboutUs">About Us</a></li>
            <li><a href="/racingdivision/sections/sponsors&collaborators.php" data-i18n="news.sponsors">Sponsors &<br>Collaborators</a></li>
            <li><a href="/racingdivision/sections/news.php" data-i18n="news.news">News</a></li>
            <li><a href="/racingdivision/sections/contacto.php" data-i18n="news.contact">Get In Touch</a></li>
            <img src="/racingdivision/img/logo-blanco.png" alt="">
        </ul>
    </div>
    <!--MENÚ DE NAVEGACIÓN-->
    <nav class="menu">
        <ul class="nav-links">
            <li><a href="/racingdivision/index.php" data-i18n="news.home">Home</a></li>
            <li><a href="/racingdivision/sections/aboutUs.html" data-i18n="news.aboutUs">About Us</a></li>
            <li><a href="/racingdivision/sections/sponsors&collaborators.php" data-i18n="news.sponsors">Sponsors & Collaborators</a></li>
            <li><a href="/racingdivision/sections/news.php" data-i18n="news.news">News</a></li>
            <li><a href="/racingdivision/sections/contacto.php" data-i18n="news.contact">Get In Touch</a></li>
            <select id="language-select-pc" class="lang-sel-pc">
                <option value="es">ES</option>
                <option value="ca">CA</option>
                <option value="en">EN</option>
            </select>
        </ul>
    </nav>
    <!--CONTENIDO CENTRAL-->
    <section class="contenedor-noticias">
        <?php
            require "../php/claseNoticia.php";
            require "../php/dbconnection.php";
            // Selecciona el lang de la URL establecido por noticias.js
            $lang = $_GET['lang'] ?? 'es';

            // Comando a ejecutar en la base de datos, devuelve todos los datos para crear un objeto noticia. Estos están
            // ordenados por relevancia de manera que primero salgan las noticias relevantes y luego por id, de mayor a 
            // menor para mostrar las noticias mas recientes arriba (debajo de las relevantes).
            $SQL = 'SELECT id, shortDesc, largeDesc, lang, foto FROM noticias WHERE lang = :lang ORDER BY relevant DESC, id DESC';
            $rst = $conn -> prepare($SQL);
            // Pasa el parámetro lang a la consulta SQL
            $rst -> bindParam(':lang', $lang);
            $rst->execute();
            /// Este fetch mode devuelve un array con objetos Noticia creados automáticamente con los atributos
            /// público de esa clase.
            $rst -> setFetchMode(PDO::FETCH_CLASS, "Noticia");
            $allNews = $rst -> fetchAll();

            /// Por cada noticia del array, la añade a la sección en forma de link en formato foto y descripción corta
            /// debajo. Los links de las noticias, llevan a una plantilla noticia con un id (id de la noticia) y un idioma
            /// pasados por url, estos dos son las claves primarias de las noticias en la bdd y son los que 
            /// determinan el contenido de la plantilla y el idioma en el que estará.
            foreach($allNews as $actuallNews){
                echo '
                    <a href="/racingdivision/noticias/noticia.php?id=' . $actuallNews->getId() . '&lang=' . $actuallNews->getLang() . '">
                    <div>
                    <img src="/racingdivision/noticias/img/'. $actuallNews -> getFoto() .'">
                    <p>' . $actuallNews -> getShortDesc() . '</p>
                    </div>
                    </a>
                ';
            }
        ?>
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
                <li><a href="/racingdivision/sections/contacto.php" data-i18n="news.contactFooter">Contact</a></li>
                <li><a href="/racingdivision/sections/contacto.php" data-i18n="news.sponsorFooter">Become a Sponsor</a></li>            </ul>
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
    <script src="/racingdivision/scripts/noticias.js"></script>
</body>
</html>