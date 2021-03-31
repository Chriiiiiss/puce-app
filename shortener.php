<?php 
    session_start();

    require_once "connection_db.php";

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $code_len = 6;
    $url_code = generate_code($chars, $code_len);

    if (isset($_SESSION['user'])) {
        $req = $bdd->prepare("INSERT INTO links(user, url, code) VALUES(:user, :url, :code)");
        $req->bindValue(":user", $_SESSION['user']);
        $req->bindValue(":url", $_POST['submit_url']);
        $req->bindValue(":code", $url_code);
        if ($req->execute()) {
            header("location:index.php?Shortener=".$url_code);
        } else {
            // header("location:index.php?Error= something gone wrong");
        }
    } else {
        $req = $bdd->prepare("INSERT INTO links(url, code) VALUES(:url, :code)");
        $req->bindValue(":url", $_POST['submit_url']);
        $req->bindValue(":code", $url_code);
        if ($req->execute()) {
            header("location:index.php?Shortener=".$url_code);
        } else {
            header("location:index.php?Error= something gone wrong");
        }
    }
    
    function generate_code($code_chars, $len) {
        $str= "";
        $chars_tab_len = strlen($code_chars);
        for ($i=0; $i < $len; $i++) { 
            $rand_chars = $code_chars[mt_rand(0, $chars_tab_len - 1)];
            $str .= $rand_chars;
        }
        return $str;
    }
?>
