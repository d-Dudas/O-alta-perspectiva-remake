<?php
if(!isset($_POST['articleId'])){
    header("location: ../home.php");
    die();
}
else {
    include './dbc.inc.php';
    print_r($_POST);
    $comment = $_POST['comment'];
    $id = $_POST['articleId'];
    $username = $_POST['username'];
    $conn = dbConnect();
    $data = date("y-m-d H:i:s");
    $conn->query("INSERT INTO comments (username, comment, articleId, commentDate) VALUES ('$username', '$comment','$id', '$data')");
    $conn->close();
    header("location: ../articol.php?id=".$id);
    die();
}