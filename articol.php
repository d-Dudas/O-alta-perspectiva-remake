<?php
    if(!isset($_GET['id'])) {
        header("location: ./home.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for articol.php -->
    <link rel="stylesheet" href="./style/article.css">
    <?php
        include './importantLinks.html';
    ?>
</head>
<body>
    <?php
        include "./accountSystemButtons.php";
        include "./background.html";
        include './navBar.html';
        include "./includes/manageArticles.php";

        if(!in_array($id,$_SESSION['seenArticles'])) {
            array_push($_SESSION['seenArticles'], $id);
            updateView($_GET['id']);
        }
        
        $articol = getArticleById($_GET['id']);
    ?>
    <div id="article">
        <?php 
            if(isset($_SESSION['ifAdmin'])) {
                if($_SESSION['ifAdmin'] == 1) {
                    echo '
                        <div id = "adminButtons">
                            <a id = "adminEditButton" href="./controlPanel.php?editArticle='.$_GET["id"].'">
                                <iconify-icon id = "adminEditIcon" icon="line-md:edit-twotone" style="color: black; font-size:4vmin;"></iconify-icon>
                            </a>
                            <button id = "deleteArticleButton" onClick = "confirmDelete('.$_GET["id"].')">
                                <iconify-icon id = "adminDeleteIcon" icon = "fluent:delete-32-regular" style="color: black; font-size: 4vmin"></iconify-icon>
                            </button>
                        </div>
                    ';
                }
            }
        ?>
        <div id="articleTitle">
            <h1>
            <?php
                echo $articol['titlu'];
            ?>
            </h1>
        </div>
        <div id="articleContent">
            <div id="posterImage">
                <img src="
                <?php
                    echo substr($articol["poster"], 1, strlen($articol["poster"]));
                ?>
                " alt="">
            </div>
            <div id="articleText">
                <?php
                    echo $articol['text'];
                ?>
            </div>
        </div>
        <div id="articleDetails">
            <div id="autor">
                <?php
                    echo $articol['autor'];
                ?>
            </div>
            <div id="vizualizari">
                <?php
                    echo $articol['views'];
                ?>
                <iconify-icon icon = "bi:eye" style="color: black; font-size: 16px"></iconify-icon>
            </div>
            <div id="dataPublicarii">
                <?php
                    echo $articol['uploadDate'];
                ?>
            </div>
        </div>
    </div>
    <div id="comments">
        <div id="commentText"><h1>Fiecare opinie contează!</h1></div>
        <div id="commentsList">
            <?php
                $comments = getComments($_GET['id']);
                if(empty($comments))
                {
                    echo '
                            <h1> Fiți prima persoană care își împărtășește opinia despre acest articol! </h1>
                        ';
                }
                foreach($comments as $c){
                    echo '
                    <div class = "commentBox">
                        <div class = "comment">
                            <div class = "commentUsername">
                                <p>'.$c['username'].'</p>
                            </div>
                            <div class = "commentText">
                                <p>'.$c['comment'].'</p>
                            </div>
                        </div>';
                    if(isset($_SESSION['username']))
                    if($_SESSION['username'] == $c['username'] || $_SESSION['ifAdmin'] == 1){
                        echo '
                        <div class = "deleteCommentBtn">
                            <a href = "./includes/deleteComment.php?id='.$c["id"].'&articleId='.$_GET['id'].'">
                                <iconify-icon class = "deleteCommentIcon" icon = "fluent:delete-32-regular" style="color: black; font-size: 3vmin"></iconify-icon>
                            </a>
                        </div>
                        ';
                    }
                    echo '</div>';
                }
            ?>
        </div>
        <form method="POST" action="./includes/writeComment.inc.php" id="writeComment">
            <label for="comment">
                <?php
                if(isset($_SESSION['username'])){
                    echo '<input type="hidden" name="articleId" value ='.$_GET["id"].'>
                    <input type="hidden" name="username" value ='.$_SESSION["username"].'>
                    <input type="text" name="comment" id="comment" placeholder = "Scrie ceva...">';
                
                } else
                    echo '<input type="text" name="comment" id="comment" placeholder = "Autentificați-vă pentru a scrie un comentariu" disabled = true>';
                ?>    
            </label>
            <label for="send">
                <button type = "submit">
                    <iconify-icon icon = "carbon:send-alt" style="color: black; font-size: 36px"></iconify-icon>
                </button>
            </label>
        </form>
    </div>


</body>
<script src="./javascript/articlePage.js"></script>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>
</html>
