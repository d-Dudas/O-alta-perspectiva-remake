<?php

function uploadArticle() {

    //Dacă există deja un fișier cu acest nume, atunci redenumim fișierul ce urmează să fie încărcat
    $rawBaseName = pathinfo($_FILES["article-upload"]["name"], PATHINFO_FILENAME );
    $target_file = pathinfo($_FILES["article-upload"]["name"], PATHINFO_FILENAME );
    $extension = pathinfo($_FILES["article-upload"]["name"], PATHINFO_EXTENSION );
    $counter = 0;
    $target_file = $target_file.".".$extension;
    while(file_exists("../sentArticles/".$target_file)) {
        $target_file = $rawBaseName . $counter . '.' . $extension;
        $counter++;
    };
    $target_dir = "../sentArticles/";
    $target_file = $target_dir . $target_file;

    move_uploaded_file($_FILES["article-upload"]["tmp_name"], $target_file);

    return $target_file;
}

function confirmationEmail($email){
    $to = $email;
    $subject = "Confirmare articol trimis";
    $txt = "Mulțumim pentru articolul trimis. În curând revenim cu informații despre publicarea articolului, sau cu o solicitare de reeditare.";
    $headers = "From: oaltaperspeciva@gmail.com" . "\r\n" .
        "Content-type:text/html;charset=UTF-8";

    mail($to,$subject,$txt,$headers);
}

if(isset($_POST["name"])) {
    include './dbc.inc.php';

    $numeAutor = $_POST["name"];
    $email = $_POST["email"];
    $titluArticol = $_POST["articleTitle"];
    $fisierArticol = uploadArticle();
    $data = date("y-m-d H:i:s");
    $conn = dbConnect();
    $insert = $conn->query("INSERT INTO sent_articles (numeAutor, email, titluArticol, fisierArticol, dataTrimitere) VALUES ('$numeAutor', '$email','$titluArticol','$fisierArticol', '$data')");
    $conn->close();

    confirmationEmail($email);

    if($insert){
        header("location: ../confirmareArticolTrimis.php");
        die();
    }

}