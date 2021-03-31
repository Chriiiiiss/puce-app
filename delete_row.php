<?php

require_once "connection_db.php";

$code = $_POST["row_code"];

try {
    $req = $bdd->query("DELETE FROM links WHERE code = '{$code}'");
    header("location:manage_links.php");
    exit;
} catch (Exception $e) {
    die("Error: ".$e);
}


?>