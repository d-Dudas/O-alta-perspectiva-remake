<?php

function uploadImage() {

    //Dacă există deja un fișier cu acest nume, atunci redenumim fișierul ce urmează să fie încărcat
    $rawBaseName = pathinfo($_FILES["image-upload"]["name"], PATHINFO_FILENAME );
    $target_file = pathinfo($_FILES["image-upload"]["name"], PATHINFO_FILENAME );
    $extension = pathinfo($_FILES["image-upload"]["name"], PATHINFO_EXTENSION );
    $counter = 0;
    $target_file = $target_file.".".$extension;
    while(file_exists("../images/".$target_file)) {
        $target_file = $rawBaseName . $counter . '.' . $extension;
        $counter++;
    };
    $target_dir = "../images/";
    $target_file = $target_dir . $target_file;

    move_uploaded_file($_FILES["image-upload"]["tmp_name"], $target_file);

    return $target_file;
}

if(isset($_POST["titlu"])) {
    include './dbc.inc.php';

    $titlu = $_POST["titlu"];
    $autor = $_POST["author"];
    $text = $_POST["articleText"];
    $posterPosition = $_POST["position"];
    $category = $_POST["artCategory"];
    $poster = uploadImage();
    $uploadedBy = $_POST["uploadedBy"];
    $conn = dbConnect();
    $data = date("y-m-d H:i:s");
    $insert = $conn->query("INSERT INTO articles (titlu, autor, text, poster, posterPosition, uploadedBy, uploadDate, category) VALUES ('$titlu', '$autor','$text','$poster', '$posterPosition
    ', '$uploadedBy', '$data', '$category')");
    $conn->close();
    if($insert){
        header("location: ../home.php");
        die();
    }

}