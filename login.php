<?php require_once("./tpl/header.php"); ?>

<div class="title">
    <div class="main-title">
        <h1 class="title-text">Connectez-vous</h1>
        <p class="subtile">
            Vous n'avez pas de compte ?
            <a class="subtile-emphasis-2" href="register.php">Créez votre compte</a>
        </p>
    </div>
    <div class="form-container-login">
        <form class="form-login" action="process_login.php" method="post">
            <div class="form-label-login">
                <label class="label-text" for="username">Nom d'utilisateur ou e-mail</label>
                <input class="form-style" name="username" type="text" required>
            </div>
            <div class="form-label-login">
                <label class="label-text" for="username">Mot de passe</label>
                <input class="form-style" name="password" type="password" required>
                <a class="dumb" href="register.php">Mot de passe oublié</a>
            </div>
            <div class="form-item-login">
                <button class="login-button">Se connecter</button>
            </div>
        </form>
    </div>
</div>
<script src="./js/ind.js"></script>
<?php require_once("./tpl/footer.php"); ?>