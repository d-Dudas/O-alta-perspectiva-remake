<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $articleId = $_GET['articleId'];
    include './dbc.inc.php';
    $conn = dbConnect();
    $conn->query("DELETE FROM comments WHERE id='$id'");
    header("location: ../articol.php?id=".$articleId);
    die();
}