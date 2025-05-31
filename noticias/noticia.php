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
            <li><a href="/racingdivision/index.html" data-i18n="noticia.home">Home</a></li>
            <li><a href="/racingdivision/sections/aboutUs.html" data-i18n="noticia.aboutUs">About Us</a></li>
            <li><a href="/racingdivision/sections/sponsors&collaborators.php" data-i18n="noticia.sponsors">Sponsors &<br>Collaborators</a></li>
            <li><a href="/racingdivision/sections/news.php" data-i18n="noticia.news">News</a></li>
            <li><a href="/racingdivision/sections/contacto.php" data-i18n="noticia.contact">Get In Touch</a></li>
            <img src="/racingdivision/img/logo-blanco.png" alt="">
        </ul>
    </div>
    <!--MENÚ DE NAVEGACIÓN-->
    <nav class="menu">
        <ul class="nav-links">
            <li><a href="/racingdivision/index.html" data-i18n="noticia.home">Home</a></li>
            <li><a href="/racingdivision/sections/aboutUs.html" data-i18n="noticia.aboutUs">About Us</a></li>
            <li><a href="/racingdivision/sections/sponsors&collaborators.php" data-i18n="noticia.sponsors">Sponsors & Collaborators</a></li>
            <li><a href="/racingdivision/sections/news.php" data-i18n="noticia.news">News</a></li>
            <li><a href="/racingdivision/sections/contacto.php" data-i18n="noticia.contact">Get In Touch</a></li>
            <select id="language-select-pc" class="lang-sel-pc">
                <option value="es">ES</option>
                <option value="ca">CA</option>
                <option value="en">EN</option>
            </select>
        </ul>
    </nav>
<!--CONTENIDO CENTRAL-->
    <section class="noticia">
        <?php
            require "../php/dbconnection.php";
            require "../php/claseNoticia.php";

            // Obtener el ID y idioma desde la URL
            // El id y el lang son la clave primaria de las noticias en la bdd, por lo que esta información
            // determina que noticia se muestra y en que idioma
            $idNews = $_GET['id'];
            $langNews = $_GET['lang'];

            // Validar el ID
            if (!is_numeric($idNews) || strlen($langNews) != 2) {
                die("ID noticia inválido");
            }
            else{
                $SQL = 'SELECT largeDesc, foto FROM noticias WHERE id = :id AND lang = :lang';
                $rst = $conn -> prepare($SQL);
                $rst -> bindParam(":id", $idNews);
                $rst -> bindParam(":lang", $langNews);
                $rst -> execute();
                $rst -> setFetchMode(PDO::FETCH_ASSOC);
                // Este fetch mode devuelve un array asociativo con el nombre de columna en la bdd como key.
                $actualNews = $rst -> fetch();
                if ($actualNews) {
                    echo '<div><img src="/racingdivision/noticias/img/' . $actualNews["foto"] . '"></div>';
                    echo $actualNews["largeDesc"];
                } else {
                    echo "Noticia no encontrada.";
                }
                // var_dump($actuallNews);
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
                <li><a href="/racingdivision/sections/contacto.php" data-i18n="noticia.contactFooter">Contact</a></li>
                <li><a href="/racingdivision/sections/contacto.php" data-i18n="noticia.sponsorFooter">Become a Sponsor</a></li>            </ul>
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