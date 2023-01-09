<?php 

if(!isset($_POST["id"])) {
    header("location: ../home.php");
    die();
}

include './dbc.inc.php';

$id = $_POST["id"];
$conn = dbConnect();

$article = $conn->query("SELECT * FROM articles WHERE id = '$id'")->fetch_assoc();
unlink($article['poster']);

$conn->query("DELETE FROM articles WHERE id = '$id'");
$conn->query("DELETE FROM comments WHERE articleId = '$id'");
$conn->close();
header("location: ../home.php");
die();


?>