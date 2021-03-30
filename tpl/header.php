<?php
session_start();
$id_session = session_id();

if(isset($_SESSION['user'])) {
    header("welcome.php");
}

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
        <link href="font/FuturaPTBook.otf">
        <link href="font/FuturaPTDemi.otf">
    </head>
    <body>
        <div class="container">
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
                                <a href="logout.php" class="connexion">Deconnexion</a>
                                <a href="#" class="profilePic">
                                    <img src="img/profilePic.png" >
                                </a>
                                ';
                            } else {
                                echo 
                                '
                                <li><a href="login.php" class="connexion">Connexion</a></li>
                                <li><a href="register.php" class="inscriptionNav">Inscription</a></li>
                                ';
                            }
                        ?>
                    </ul >
                </div>
                <div class="nav-line"></div>
            </header>
        </div>