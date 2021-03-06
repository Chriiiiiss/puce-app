<?php 
    require_once "./tpl/header.php"; 
    require_once "connection_db.php";
    $redirect_link = "localhost:8888/puce-app/";
    $user = $_SESSION['user'];
    $i = 0;

    try {
        $req = $bdd->prepare("SELECT url, code, clicks, creation_date, activated FROM links WHERE user = '{$user}'");
        $res = $req->execute();
        $res = $req->fetchAll();
        $links_number = count($res);
    } catch (Exception $e) {
        die("Error: ".$e);
    }

    function get_date($str) {
        $to_date = strtotime($str);
        return date("d-m-Y",$to_date);
    }
?>

<div>
    <h1 class="title-text">Gérer mes liens</h1>
</div>
<button class="add-link-button">+</button>
<div class="popUp">
    <div class=s>
        <div class="form">
            <form action="shortener.php" method="post">
                    <?php 
                        if (isset($_GET["Shortener"])) {
                            echo '<input value="'.$redirect_link.$_GET["Shortener"].'" localhost" name="submit_url" type="url" class="inputSmall index_input shortened" placeholder="Collez votre lien pour le simplifier">';
                        } else {
                            echo '<input name="submit_url" type="url" class="inputSmall index_input" placeholder="Collez votre lien pour le simplifier">';
                        }
                    ?>
                    <input type="submit" name="manage" value="Simplifier" class="submitSmall">
            </form>
        </div>
    </div>
</div>


<div class="container-links">
    <div class="category-titles">
        <p>
            <?= $links_number." lien.s" ?>
        </p>
    </div>
    <div class="link-elem">
        <?php 
            foreach ($res as $row) {
                echo 
                '
                    <div class= "link">
                    <hr></hr>
                        <div class="link-made">
                            <div>
                                <p class="date">'.get_date($row['creation_date']).'</p>
                                <p class="long-link">'.$row['url'].'</p>
                                <a href="http://'.$redirect_link.$row['code'].'"class="short-link" target="_blank">'.$redirect_link.$row['code'].'</a>
                            </div>
                            <div class="actions">
                                <div class="click_container"> 
                                    <span class="number-clicks">'.$row['clicks'].'</span>
                                    <div class="cursor_img""></div>
                                </div>
                            <div class="other-actions">
                                <form class="garbage-form" action="delete_row.php" method="post"> 
                                    <button type="submit" name="row_code" value="'.$row['code'].'" class="garbage"></button>
                                </form>
                                ';
                if ($row['activated']) {
                    echo 
                    '
                        <form class="toggle-form" action="disable_link.php" method="post">
                            <label class="switch">
                                <input name="checked" class="check" type="checkbox" data-index-number="'.$i.'" checked>
                                <span class="slider"></span>
                            </label>
                            <input name="code" class="fake-input" type="text" value="'.$row['code'].'">
                        </form>
                        </div>
                        </div>
                        </div>
                        </div>
                        ';
                    } else {
                        echo 
                        '
                            <form class="toggle-form" action="disable_link.php" method="post">

                                <label class="switch">
                                    <input name="checked" class="check" type="checkbox" data-index-number="'.$i.'">
                                    <span class="slider"></span>
                                </label>
                                <input name="code" class="fake-input" type="text" value="'.$row['code'].'">
                            </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            ';
                    }
                $i += 1;
}
        ?>
        <hr></hr>
    </div>
</div>
<script src="./js/manage_links.js"></script>
