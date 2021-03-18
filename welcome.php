<?php
session_start();
echo 'Welcome'.$_SESSION['User'];
require_once("tpl/footer.php");
?>