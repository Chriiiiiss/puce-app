<?php
ini_set('display_error', 1);
require_once "connection_db.php";


if(isset($_POST["password"])) {
    if ($_POST["password"] != $_POST["passwordconf"]) {
        header("location:register.php?Errorwp= Vos passwords ne sont pas identiques");
        exit;
    }
} else {
    header("location:register.php?Error= Il y a eu un soucis lors de l'inscription");
    exit;
}

$req = $bdd->prepare("INSERT INTO account_puce(username, password, email) VALUES(:username, :password, :email)");

$req->bindValue(":username", $_POST["username"]);
$req->bindValue(":password", password_hash($_POST["password"], PASSWORD_DEFAULT));
$req->bindValue(":email", $_POST["email"]);
try {
    $req->execute();
    header("location:index.php");
    exit;
} catch (Exception $e) {
    header("location:register.php?Error= Nom d'utilisateur ou e-mail déjà existant !");
}
// if($req->execute()) {
//     // header("location:index.php");
//     exit;
// } else {
// //     header("location:register.php?Error= Nom d'utilisateur ou e-mail déjà existant !");
// }



?>





