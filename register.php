<?php require_once("tpl/header.php"); ?>
<div>
    <div class="main-title">
        <h1 class="title-text">
            Créer votre compte
            <strong class="title-emphasis-2">PUCE</strong>
        </h1>
        <p class="subtile">
            Vous avez déjà un compte ?
            <a class="subtile-emphasis-2" href= "login.php">Connectez-vous</a>
        </p>
    </div>
</div>
<div class="form-container">
    <form class="form-register" action="register_process.php" method="post">
        <div class="form-label">
            <label class="label-text" for="username">Nom d'utilisateur</label>
            <input class="form-style" name="username" type="text" required>
            <?php
                if (isset($_GET['Error'])) {
                    echo "<div class='error_handling'> <p>".$_GET["Error"]."</p></div>";
                }
            ?>
        </div>
        <div class="form-label">
            <label class="label-text" for="email">Adresse e-mail</label>
            <input class="form-style" name="email" type="email" required>
        </div>
        <div class="form-label">
            <label class="label-text" for="password">Mot de passe</label>
            <input class="form-style" name="password" type="password" required>
        </div>
        <div class="form-label">
            <label class="label-text" for="passwordconf">Confirmation</label>
            <input class="form-style" name="passwordconf" type="password" required>
            <?php
                if (isset($_GET['Errorwp'])) {
                    echo "<div class='error_handling'> <p>".$_GET["Errorwp"]."</p></div>";
                }
            ?>
        </div>
        <div class="form-item">
            <button class="login-button">Créer mon compte</button>
            <p>En créant un compte, vous accepter les conditions d’utilisation<br>et la politique de confidentialité.</p>
        </div>
    </form>
</div>
<?php require_once("tpl/footer.php"); ?>