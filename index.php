<?php require_once("./tpl/header.php"); ?>
<?php 
    $redirect_link = "localhost:8888/puce-app/"; 
    $code = '';
    if (count($_GET) > 0) {
        foreach ($_GET as $key => $value) {
            $code = str_replace('/', '', $key);
        }
        require_once "connection_db.php";
        try {
            $url = $bdd->query("SELECT url FROM links WHERE code = '{$code}' AND activated = 1")->fetchColumn();
            if ($url) {
                $bdd->query("UPDATE links SET clicks = clicks + 1 WHERE code = '{$code}'");
                header("location: ".$url);
                exit;
            } else {
                header("location: error_doc.php");
                exit;
            }
        } catch (Exception $e) {
            die("Error: ".$e);
        }
    }
?>

    <div class="container">
        <div class="section1">
            <div class="text">
                <h1>Votre URL, aussi petit qu'une <span>PUCE</span></h1>
                <h2>Simplifier vos liens et suivez leur statistiques en un clic !</h2>
                <div class="inscriptionButton">
                    <?php 
                        if (isset($_SESSION['user'])) {
                            echo "<a href='./manage_links.php' class='purpleButton'>Gérer mes liens</a>";
                        } else {
                            echo "<a href='./register.php' class='inscription'>Inscription</a>";
                        }
                    ?>
                </div>
            </div>
            <div class="background">
            </div>
        </div>
    </div>
        <div class=section2>
            <div class="form">
                <form action="shortener.php" method="post">
                    <?php 
                        if (isset($_GET["Shortener"])) {
                            echo '<input value="'.$redirect_link.$_GET["Shortener"].'" localhost" name="submit_url" type="url" class="input index_input shortened" placeholder="Collez votre lien pour le simplifier">';
                        } else {
                            echo '<input name="submit_url" type="url" class="input index_input" placeholder="Collez votre lien pour le simplifier">';
                        }
                    
                    ?>
                    <input type="submit" value="Simplifier" class="submit" disabled>
                </form>
                <p class="accord">
                    En utilisant notre service, vous acceptez les conditions d’utilisation et la politique de confidentialité
                </p>
            </div>
        </div>
        <div class=section3>
            <div class="container2">
                <h2>Pourquoi raccourcir un url ?</h2>
                <div class=block1>
                    <span>1</span>
                    <div class=sousBlock1>
                        <h3>Référencement</h3>
                        <p>Les liens raccourcis, ou backlinks, sont un facteur de référencement important. Par exemple, Google récompense les sites qui reçoivent de nombreux backlinks.</p>
                    </div>
                </div>
                <div class=block2>
                    <div class=sousBlock2>
                        <h3>Simplicité</h3>
                        <p>Les backlinks sont plus simples à partager notamment sur les réseaux sociaux comme Twitter (avec sa limite de 280 caractères par tweet). Les backlinks sont aussi plus esthétiques puisque l’URL est plus discrète.</p>
                    </div>
                    <span>2</span>
                </div>
                <div class=block3>
                    <span>3</span>
                    <div class=sousBlock3>
                        <h3>Suivi</h3>
                        <p>Raccourcir vos URL c’est profiter d’un outil plus détaillé que Google Analytics vous permettant de comptabiliser le nombre de clics par lien raccourci sur simple inscription.
                        </p>
                    </div>
                </div>
                <div class=block4>
                    <div class=sousBlock4>
                        <h3>Confiance</h3>
                        <p>Un lien trop long et/ou composé de symboles illisibles, sera encombrant et perturbera votre message, peu importe où vous voudrez l’utiliser. Dans certains cas, il pourrait même paraître suspect !
                        </p>
                    </div>
                    <span>4</span>
                </div>
                <?php 
                    if (isset($_SESSION['user'])) {
                        echo 
                        '
                        <h4></h4>
                        <div class="inscriptionButton">
                        <a href="./manage_links.php" class="purpleButton">Gérer mes liens</a>
                        </div>
  
                        ';
                    } else {
                        echo 
                        '
                        <h4>Alors n’hésitez plus !</h4>
                        <div class="inscriptionButton">
                            <a href="./register.php" class="inscription">Inscription</a>
                        </div>
                        ';
                    }
                ?>
            </div>
        </div>
    <script src="./js/index.js"></script>

<?php require_once("./tpl/footer.php"); ?>