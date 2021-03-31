<?php 

require_once "connection_db.php";

$checked = 0;
$code = $_POST["code"];

if (isset($_POST["checked"])) {
    try {
        $req = $bdd->query("UPDATE links SET activated = 1 WHERE links.code = '{$code}'");
        header("location:manage_links.php");
    } catch (Exception $e) {
        die("Error: ".$e);
    }
} else {
    try {
        $req = $bdd->query("UPDATE links SET activated = 0 WHERE links.code = '{$code}'");
        header("location:manage_links.php");
    } catch (Exception $e) {
        die("Error: ".$e);
    }
}




var_dump($code);
var_dump($checked);
?>