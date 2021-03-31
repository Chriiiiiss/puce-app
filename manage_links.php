<?php 
    require_once "./tpl/header.php"; 
    require_once "connection_db.php";
    $redirect_link = "localhost:8888/puce-app/";
    $user = $_SESSION['user'];

    try {
        $req = $bdd->prepare("SELECT url, code, clicks, creation_date FROM links WHERE user = '{$user}'");
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
                                <form class="toggle-form" action="disable_link.php" method="post">
                                <p>enable</p>
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </form>
                            </div>
                            </div>
                        </div>
                </div>
                ';
            }
        ?>
        <hr></hr>
    </div>
</div>

<?php require_once("./tpl/footer.php"); ?>