<?php
session_start();
$id_session = session_id();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Puce</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/headers.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/register.css">
        <link rel="stylesheet" href="./css/manage_links.css">
        <link href="font/FuturaPTBook.otf">
        <link href="font/FuturaPTDemi.otf">
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MR3F6WR');</script>
        <!-- End Google Tag Manager -->
    </head>
    <body>
     <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MR3F6WR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
     <!-- End Google Tag Manager (noscript) -->
        <div class="containerHeader">
            <header>
                <div class="navbar">
                    <a href="./index.php">
                    <img src="img/logo.jpg" class="logo" alt="logo puce">
                    </a>
                    <ul class=links>
                    <?php 
                        if (isset($_SESSION['user'])) {
                            echo 
                            '
                            <p> Bonjour <span class="username">'.$_SESSION['user'].'</span> !</p>
                            ';
                        }
                    ?>
                    <nav id="hamnav">
                            <label for="hamburger">&#9776;</label>
                            <input type="checkbox" id="hamburger"/>
                        <?php 
                            if (isset($_SESSION['user'])) {
                                echo 
                                '
                                <div id="hamitems">
                                    <a href="logout.php" class="logIn">Déconnexion</a>
                                    <a href="#" class="profilePic">
                                        <img src="img/profilePic.png" >
                                    </a>
                                    <a href="#" class="logIn myprofile">Mon Profil</a>
                                </div>
                                ';
                            } else {
                                echo 
                                '
                                <div id="hamitems">
                                    <a href="login.php" class="logIn">Connexion</a>
                                   <a href="register.php" class="inscriptionNav">Inscription</a>
                                </div>
                                ';
                            }
                        ?>
                    </nav>
                    </ul >
                </div>
                <div class="nav-line"></div>
            </header>
        </div>