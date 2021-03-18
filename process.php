<?php
session_start(); 
require_once('co.php');

if(isset($_POST['Login'])) {
    if(empty($_POST['UName']) || empty($_POST['Pass'])) {
        header("location:index.php?Empty=Please Fill In The Blanks");
    } else {
        $query = "select * from useraccount where UName='".$_POST['UName']."' and Pass='".$_POST['Pass']."'" ;
        $result = mysqli_query($con, $query);
        if(mysqli_fetch_assoc($result)) {
            $_SESSION['User']=$_POST['UName'];
            header("location:welcome.php");
        } else {
            header('location:index.php?Invalid= Invalid Password or Username');
        }
    }
} else {
    echo 'No';
}

?>