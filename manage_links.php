<?php require_once("./tpl/header.php"); ?>

<div>
    <h1 class="title-text">Gérer mes liens</h1>
</div>
<button class="add-link-button">+</button>
<div class="container">
    <div class="category-titles">
        <p>
            9 lien(s)
        </p>
        <p>
            clic(s)
        </p>
        <p>
            actions
        </p>
    </div>
    <hr></hr>
    <div>
        <div class="link-made">
            <div>
                <p class="date">17 mars 2020</p>
                <p class="long-link">www.unsupersitemaislurlestbcptroplong.com</p>
                <p class="short-link">puce/37mmnwht</p>
            </div>
            <div class="number-clicks">5</div>
            <div class="actions">
                <img src="./img/garbage.png" class="garbage" alt="garbage can">
                <div class="copy-button">
                    <button class="copy-link">copier</button>
                </div>
            </div>
        </div>
        <hr></hr>
    </div>
</div>

<?php require_once("./tpl/footer.php"); ?>