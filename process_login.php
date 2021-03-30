<?php 

session_start();

try {
    $bdd = new PDO("mysql:host=localhost;dbname=puce_db;charset:utf8","root","root");
} catch (Exception $e)
{ 
    die("Erreur : ". $e->getMessage()); 
}

if(isset($_POST["password"]) && isset($_POST["username"])) {
    $req = $bdd->prepare("SELECT * FROM account_puce WHERE username = ?");
    $req->execute(array($_POST["username"]));
    $row = $req->fetch();
    if($row) {
        if ($row["password"] != $_POST["password"]) {
            header("location:login.php?Error= Nom d'utilisateur / e-mail ou mot de passe incorrect");
        } else {
            $_SESSION["user"] = $_POST["username"];
            header("location:index.php");
        }
    } else {
        header("location:login.php?Error= Nom d'utilisateur / e-mail ou mot de passe incorrect");
    }
    // if($req->execute()) {
    //     header("location:welcome.php");
    //     exit;
    // } else {
    //     // header("location:login.php?Error= Nom d'utilisateur/e-mail ou mot de passe incorrect");
    //     echo "T'es nul";
    // }
}

?>