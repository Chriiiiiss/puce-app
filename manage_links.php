<?php 
    require_once "./tpl/header.php"; 
    require_once "connection_db.php";
    $redirect_link = "localhost:8888/puce-app/";

    try {
        $req = $bdd->prepare("SELECT url, code, clicks, creation_date FROM links");
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
<div class="container">
    <div class="category-titles">
        <p>
            <?= $links_number." lien.s" ?>
        </p>
        <p>
            clic(s)
        </p>
        <p>
            actions
        </p>
    </div>
    <div class="link-elem">
        <?php 
            foreach ($res as $row) {
                echo 
                '
                    <div class= "link">
                    <hr></hr>
                    <div>
                        <div class="link-made">
                            <div>
                                <p class="date">'.get_date($row['creation_date']).'</p>
                                <p class="long-link">'.$row['url'].'</p>
                                <a href="http://'.$redirect_link.$row['code'].'"class="short-link">'.$redirect_link.$row['code'].'</p>
                            </div>
                            <div class="number-clicks">'.$row['clicks'].'</div>
                            <div class="actions">
                                <img src="./img/garbage.png" class="garbage" alt="garbage can">
                                <div class="copy-button">
                                    <a href="#" class="copy-link">copier</a>
                                    <button class="copy-link">copier</button>
                                </div>
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