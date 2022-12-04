<?php
    include "./includes/manageArticles.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for home page -->
    <link rel="stylesheet" href="style/allArticles.css">
    <!-- News for home page -->
    <link rel="stylesheet" href="style/news.css">
    <?php
        include './importantLinks.html';
    ?>
</head>
<body>
    <?php
        include './navBar.html';
        include './navBarMobile.html';
        include "./accountSystemButtons.php";
        include "./background.html";
    ?>
    <div id="articlesBox">
        <?php
            $articles = getArticles();

            foreach($articles as $a){
                echo '
                    <div class = "articleBox">
                        <a href = "./articol.php?id='.$a["id"].'">
                            <div class = "articles" style = "background-image: url('.substr($a["poster"], 1, strlen($a["poster"])).'); background-position: '.$a["posterPosition"].'"">
                                <div class = "articlePreview">
                                    <div class = "articleTitle"><p>'.$a["titlu"].'</p></div>
                                    <div class = "articleText"><p>'.$a["text"].'</p></div>
                                </div>
                            </div>
                        </a>
                    </div>

                ';
            }
        ?>
    </div>
    <div id="news">
        <div id="newsTitle">
            <h2>Articole recomandate de noi</h2>
        </div>
        <div id="newsList">
            <?php
                $suggestedArticles = getSuggestedNews();
                foreach($suggestedArticles as $s){
                    echo '
                    <a class="suggestedArticle" href="'.$s['link'].'" target = "_blank">
                        <img src="'.$s['poster'].'" width="100%" alt="'.$s['titlu'].'">
                        <p><strong>'.$s['titlu'].'</strong></p>
                    </a>
                    ';
                }
            ?>
        </div>
    </div>
</body>
<?php
        include './footer.html';
?>
<script src="./javascript/allArticlesPage.js"></script>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>
<!-- Nav bar for mobile devices javascript -->
<script src="./javascript/navBarMobile.js"></script>
</html>