<?php 

if(!isset($_POST["id"])) {
    header("location: home.php");
    die();
}

function uploadImage() {

    //Dacă există deja un fișier cu acest nume, atunci redenumim fișierul ce urmează să fie încărcat
    $rawBaseName = pathinfo($_FILES["image-upload-edit"]["name"], PATHINFO_FILENAME );

    $target_file = pathinfo($_FILES["image-upload-edit"]["name"], PATHINFO_FILENAME );

    $extension = pathinfo($_FILES["image-upload-edit"]["name"], PATHINFO_EXTENSION );
    $counter = 0;
    $target_file = $target_file.".".$extension;
    while(file_exists("../images/".$target_file)) {
        $target_file = $rawBaseName . $counter . '.' . $extension;
        $counter++;
    };
    $target_dir = "../images/";
    $target_file = $target_dir . $target_file;

    move_uploaded_file($_FILES["image-upload-edit"]["tmp_name"], $target_file);

    return $target_file;
}

include './dbc.inc.php';

$id = $_POST["id"];
if(isset($_POST["position"]))
    $posterPosition = $_POST["position"];
else
    $posterPosition = $_POST["originalPosterPosition"];
$titlu = $_POST["titlu"];
$autor = $_POST["author"];
$text = $_POST["articleText"];

$poster = uploadImage();
if($poster == "../images/0.")
    $poster = $_POST["originalPoster"];
else {
    unlink($_POST["originalPoster"]);
}

$conn = dbConnect();
$conn->query("UPDATE articles SET titlu = '$titlu', autor='$autor', text='$text', poster='$poster', posterPosition='$posterPosition' WHERE id = '$id'");

$conn->close();

header("location: ../articol.php?id=".$id);
die();

?>