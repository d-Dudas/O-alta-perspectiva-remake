<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for trimiteArticol page -->
    <link rel="stylesheet" href="style/trimiteArticol.css">
    <?php
        include './importantLinks.html';
    ?>
</head>
<body>
    <?php
        include './navBar.html';
        include "./accountSystemButtons.php";
        include "./background.html";
    ?>
    <div id="sendArticleBox">
        <form method = "POST" action="./includes/sendArticle.inc.php" id="sendArticleForm" enctype="multipart/form-data">
            <input type="text" id="name" name="name" placeholder="Nume...">
            <?php
                if(isset($_SESSION['email']))
                    echo '<input type="hidden" name="email" id="email" value="'.$_SESSION['email'].'">';
                else
                    echo '<input type="text" id="email" name="email" placeholder="Adresă mail...">
                            <p id = "emailAlert">Adresă mail invalidă</p>';
            ?>
            <input type="text" name="articleTitle" id="articleTitle" placeholder="Titlu articol...">
            <label for="article-upload" class="custom-file-upload">
                <div><iconify-icon icon = "fa:upload" style="color: black; font-size: 1.5rem"></div> Încarcă articol
            </label>
            <input name="article-upload" id="article-upload" type="file"/>
            <p id = "formatAlert">Pot fi încărcate doar fișierele de format: .pdf, .docx, .doc</p>
            <p id = "noContentAlert">Nu ați ales niciun fișier</p>
            <input type="submit" value="Trimite">
        </form>
    </div>
    <div id="informatiiGenerale">
        <p>Organizația noastră tinde spre cooperarea cu comunitatea și apreciază orice scriere cu valoare culturală.</p>

        <p>Vă rugăm să completați fiecare câmp.</p>

        <p>După trimiterea articolului veți primi un e-mail de confirmare, apoi un e-mail în care vă vom comunica data publicării, sau cerințele de reeditare.</p>

        <p>Vă mulțumim!</p>
    </div>
</body>
<script src="./javascript/trimiteArticolPage.js"></script>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>
</html>