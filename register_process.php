<?php

if(isset($_POST["password"])) {
    if ($_POST["password"] != $_POST["passwordconf"]) {
        header("location:register.php?Errorwp= Vos passwords ne sont pas identiques");
        exit;
    }
} else {
    header("location:register.php?Error= Il y a eu un soucis lors de l'inscription");
    exit;
}

try {
    $bdd = new PDO("mysql:host=localhost;dbname=puce_db;charset:utf8","root","root");
} catch (Exception $e)
{ 
    die("Erreur : ". $e->getMessage()); 
}

// function checkDb($bdd, $string) {
//     $req = $bdd->
// }

$req = $bdd->prepare("INSERT INTO account_puce(username, password, email) VALUES(:username, :password, :email)");

$req->bindValue(":username", $_POST["username"]);
$req->bindParam(":password", $_POST["password"]);
$req->bindParam(":email", $_POST["email"]);
if($req->execute()) {
    header("location:index.php?Welcome = Bienvenu");
    exit;
} else {
    header("location:register.php?Error= Nom d'utilisateur ou e-mail déjà existant !");
}



?>





