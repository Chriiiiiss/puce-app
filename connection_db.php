<?php 

$ip = "localhost";
$db_name = "puce_db";
$u_name = "root";
$psswd = "root";


try {
    $bdd = new PDO("mysql:host=".$ip.";dbname=".$db_name.";charset:utf8",$u_name,$psswd);
} catch (Exception $e)
{ 
    die("Erreur : ". $e->getMessage()); 
}

?>