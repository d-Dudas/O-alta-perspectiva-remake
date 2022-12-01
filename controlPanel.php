<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- ControlPanel CSS -->
    <link rel="stylesheet" href="./style/controlPanel.css">
    <!-- Scroll CSS -->
    <link rel="stylesheet" href="./style/scroll.css">
    <!-- CKEditor script -->
    <script src="./javascript/ckeditor5-build-classic/ckeditor.js"></script>
    <?php
        include './importantLinks.php';
    ?>
</head>

<body>
    <?php
        include './accountSystemButtons.php';
        include './navBar.php';
        include './background.php';
        include './includes/controlPanelFunctions.inc.php';
        if(isset($_SESSION['ifAdmin'])){
            if($_SESSION['ifAdmin'] == 0){
                header("location: ./index.php");
                die();
            }
        }
        else {
            header("location: ./index.php");
            die();
        }
    ?>

    <div id="menu">
        <h1>Secțiuni de administrat</h1>
        <div id="menuButtons">
            <button class="menuButton" onclick="showThis('#addArticle')">Încarcă un articol nou</button>
            <button class="menuButton" onclick="showThis('#sentArticlesBox')">Articole trimise de utilizatori</button>
            <button class="menuButton" onclick="showThis('#sentMessagesBox')">Mesaje trimise de utilizatori</button>
            <button class="menuButton" onclick="showThis('#addSuggestions')">Adaugă o nouă recomandare de
                articol</button>
            <?php 
                if(isset($_GET["editArticle"])) {
                    echo '
                    <button class="menuButton" onclick="showThis(\'#editArticle\')">Editare articol</button>
                    ';
                }
            ?>
        </div>
    </div>

    <div id="selectedPanel">
        <!-- Form pentru a încărca un articol nou -->
        <form class="selectedPanelElements" id="addArticle" method="POST" action="./includes/uploadArticle.inc.php"
            enctype="multipart/form-data">
            <div id="dateArticol">
                <label for="titlu">
                    <input type="text" name="titlu" id="titlu" placeholder="Titlu">
                </label>
                <label for="author">
                    <input type="text" name="author" id="author" placeholder="Autor">
                </label>
                <label for="image-upload" class="custom-file-upload">
                    <div>
                        <iconify-icon icon="fa:upload" style="color: black; font-size: 1.5rem">
                    </div> Imagine poster
                </label>
                <input name="image-upload" id="image-upload" type="file" />
            </div>
            <div id="pozitionareImagine">
                <h1>Poziționare imagine poster</h1>
                <label for="position" id="pozitii">
                    <input type="radio" name="position" value="top left">
                    <input type="radio" name="position" value="top center">
                    <input type="radio" name="position" value="top right">
                    <input type="radio" name="position" value="center left">
                    <input type="radio" name="position" value="center center">
                    <input type="radio" name="position" value="center right">
                    <input type="radio" name="position" value="bottom left">
                    <input type="radio" name="position" value="bottom center">
                    <input type="radio" name="position" value="bottom right">
                </label>
            </div>
            <label for="articleText">
                <textarea name="articleText" id="articleText" cols="30" rows="10"></textarea>
            </label>
            <label for="sendButton">
                <p>Trimite</p>
                <button type="submit" name="sendButton" id="sendButton">
                    <iconify-icon icon="fa:send-o" style="font-size:3vmin;"></iconify-icon>
                </button>
            </label>

            <?php
                echo '<input type="hidden" name="uploadedBy" id="uploadedBy" value = '.$_SESSION['username'].'>';
            ?>
        </form>

        <!-- Lista articolelor trimise de utilizatori -->
        <div class="selectedPanelElements" id="sentArticlesBox">
            <h2>Articole trimise</h2>
            <div id="sentArticlesList">
                <?php
                    $sentArticles = getSentArticles();
                    if(empty($sentArticles))
                        echo '<h1>Nu sunt articole trimise.<h2>';
                    else
                    {
                        echo '
                                <div class = "articolTrimisBox headerForUserSents">
                                    <p>Data trimiterii</p>
                                    <p>Nume autor</p>
                                    <p>Adresă email</p>
                                    <p>Titlu articol</p>
                                    <p>Descarcă articol</p>
                                </div>
                            ';
                        foreach($sentArticles as $sa)
                        {
                            echo '
                                <div class = "articolTrimisBox">
                                    <p>'.$sa['dataTrimitere'].'</p>
                                    <p>'.$sa['numeAutor'].'</p>
                                    <p>'.$sa['email'].'</p>
                                    <p>'.$sa['titluArticol'].'</p>
                                    <a target = "_blank" href = "./includes/downloadSentArticle.inc.php?file='.$sa['fisierArticol'].'">
                                        <div><iconify-icon class = "downloadButtonforArticles" icon = "ph:download-bold"></div>
                                    </a>
                                </div>
                            ';
                        }
                    }
                ?>
            </div>
        </div>

        <!-- Lista mesajelor trimise de utilizatori -->
        <div class="selectedPanelElements" id="sentMessagesBox">
            <h2>Mesaje trimise</h2>
            <div id="sentMessagesList">
                <?php
                    $sentMessages = getSentMessages();
                    if(empty($sentMessages))
                        echo '<h1>Nu sunt mesaje trimise.<h2>';
                    else
                    {
                        echo '
                                <div class = "mesajTrimisBox headerForUserSents">
                                    <p>Data trimiterii</p>
                                    <p>Nume</p>
                                    <p>Adresă email</p>
                                    <p>Mesaj</p>
                                </div>
                            ';
                        foreach($sentMessages as $sa)
                        {
                            echo '
                                <div class = "mesajTrimisBox">
                                    <p>'.$sa['dataTrimitere'].'</p>
                                    <p>'.$sa['nume'].'</p>
                                    <p>'.$sa['email'].'</p>
                                    <p>'.$sa['mesaj'].'</p>
                                </div>
                            ';
                        }
                    }
                ?>
            </div>
        </div>

        <!-- Form pentru a adauga o noua recomandare de articol -->
        <form class="selectedPanelElements" method="POST" action="./includes/addSuggestions.inc.php"
            id="addSuggestions">
            <h2>Adaugă articol la lista articolelor recomandate</h2>
            <input type="text" name="suggestionTitle" id="suggestionTitle" placeholder="Titlu articol...">
            <input type="text" name="suggestionPoster" id="suggestionPoster" placeholder="Link poster articol...">
            <input type="text" name="suggestionLink" id="suggestionLink" placeholder="Link articol...">
            <input type="hidden" name="suggestionUploadedBy" value="<?php echo $_SESSION['username']; ?>">
            <input type="submit" value="Trimite">
        </form>

        <?php 
                if(isset($_GET["editArticle"])) {
                    $article = getArticleById($_GET["editArticle"]);
                    echo '
                    <!-- Form pentru a încărca un articol nou -->
                    <form class = "selectedPanelElements" id="editArticle" method = "POST" action = "./includes/editArticle.inc.php" enctype="multipart/form-data">
                        <input type = hidden name = "id" value = "'.$_GET["editArticle"].'" style="display:none"/> 
                        <input type = hidden name = "originalPoster" value = "'.$article["poster"].'" style="display:none"/> 
                        <input type = hidden name = "originalPosterPosition" value = "'.$article["posterPosition"].'" style="display:none"/> 
                        <div id="dateArticol">
                            <label for="titlu">
                                <input type="text" name="titlu" id="titlu" placeholder = "Titlu" value="'.$article['titlu'].'">
                            </label>
                            <label for="author">
                                <input type="text" name="author" id="author" placeholder = "Autor" value="'.$article['autor'].'">
                            </label>
                            <label for="image-upload-edit" class="custom-file-upload">
                                <div><iconify-icon icon = "fa:upload" style="color: black; font-size: 1.5rem"></div> Imagine poster
                            </label>
                            <input name="image-upload-edit" id="image-upload-edit" type="file"/>
                        </div>
                        <div id="pozitionareImagine">
                            <h1>Poziționare imagine poster</h1>
                            <label for="position" id="pozitii">
                                <input type="radio" name="position" value="top left">
                                <input type="radio" name="position" value="top center">
                                <input type="radio" name="position" value="top right">
                                <input type="radio" name="position" value="center left">
                                <input type="radio" name="position" value="center center">
                                <input type="radio" name="position" value="center right">
                                <input type="radio" name="position" value="bottom left">
                                <input type="radio" name="position" value="bottom center">
                                <input type="radio" name="position" value="bottom right">
                            </label>
                        </div>
                        <label for="articleText">
                            <textarea name="articleText" id="articleTextEditor" cols="30" rows="10">'.$article['text'].'</textarea>
                        </label>
                        <label for="sendButton">
                            <p>Trimite</p>
                            <button type="submit" name="sendButton" id="sendButton">
                                <iconify-icon icon="fa:send-o" style="font-size:3vmin;"></iconify-icon>
                            </button>
                        </label>
                        
                    </form>
                    ';
        }
        ?>
    </div>

</body>
<script>
ClassicEditor
    .create(document.querySelector('#articleText'))
    .catch(error => {
        console.error(error);
    });
ClassicEditor
    .create(document.querySelector('#articleTextEditor'))
    .catch(error => {
        console.error(error);
    });
</script>
<script src="./javascript/ckeditor5-build-classic/ckeditor.js"></script>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Upload article form JavaScript -->
<script src="./javascript/uploadArticle.js"></script>
<!-- Control Panel effects JavaScript -->
<script src="./javascript/controlPanel.js"></script>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>

</html>