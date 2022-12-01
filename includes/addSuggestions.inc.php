<?php
if(!isset($_POST['suggestionLink'])){
    header("location: ../home.php");
    die();
}
else {
    include './dbc.inc.php';
    $titlu = $_POST['suggestionTitle'];
    $poster = $_POST['suggestionPoster'];
    $link = $_POST['suggestionLink'];
    $sentBy = $_POST['suggestionUploadedBy'];
    date_default_timezone_set('Europe/Bucharest');
    $data = date("y-m-d H:i:s");
    $conn = dbConnect();
    $conn->query("INSERT INTO suggestedArticles (titlu, poster, link, trimisDe, dataTrimitere) VALUES ('$titlu','$poster','$link','$sentBy','$data')");
    $conn->close();
    header("location: ../home.php");
    die();
}