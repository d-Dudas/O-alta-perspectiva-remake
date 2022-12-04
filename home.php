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
    <link rel="stylesheet" href="style/home.css">
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
    <div id="articles">
        <div id="mostRecentArticle">
        <?php
            $articles = getRecentArticles();
            echo '
                <a href = "./articol.php?id='.$articles[0]["id"].'"><div id = "article1" class = "articles" style = "background-image: url('.substr($articles[0]["poster"], 1, strlen($articles[0]["poster"])).'); background-position: '.$articles[0]["posterPosition"].'">
                    <div class = "articlePreview">
                        <div class = "articleTitle"><p>'.$articles[0]["titlu"].'</p></div>
                        <div class = "articleText"><p>'.$articles[0]["text"].'</p></div>
                    </div>
                </div></a>

            ';
        ?>
        </div>
        <div id="recentArticles">
            <?php
                echo '
                <a href = "./articol.php?id='.$articles[1]["id"].'" class = "article-a"><div id = "article2" class = "articles" style = "background-image: url('.substr($articles[1]["poster"], 1, strlen($articles[1]["poster"])).'); background-position: '.$articles[1]["posterPosition"].'">
                    <div class = "articlePreview articlePreviewSmall">
                        <div class = "articleTitle articleTitleSmall"><p>'.$articles[1]["titlu"].'</p></div>
                        <div class = "articleText"><p>'.$articles[1]["text"].'</p></div>
                    </div>
                </div></a>

                ';
                echo '
                <a href = "./articol.php?id='.$articles[2]["id"].'" class = "article-a"><div id = "article3" class = "articles" style = "background-image: url('.substr($articles[2]["poster"], 1, strlen($articles[2]["poster"])).'); background-position: '.$articles[2]["posterPosition"].'">
                    <div class = "articlePreview articlePreviewSmall">
                        <div class = "articleTitle articleTitleSmall"><p>'.$articles[2]["titlu"].'</p></div>
                        <div class = "articleText"><p>'.$articles[2]["text"].'</p></div>
                    </div>
                </div></a>

                ';
            ?>
        </div>
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
    <?php
        include './footer.html';
    ?>
</body>
<script src="./javascript/homePage.js"></script>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>
<!-- Nav bar for mobile devices javascript -->
<script src="./javascript/navBarMobile.js"></script>
</html>