<?php

if(isset($_POST['name'])){
    $nume = $_POST['name'];
    $email = $_POST['email'];
    $mesaj = $_POST['mesaj'];
    include './dbc.inc.php';
    $conn = dbConnect();
    $data = date("y-m-d H:i:s");
    $conn->query("INSERT INTO sent_messages (nume, email, mesaj, dataTrimitere) VALUES ('$nume','$email','$mesaj', '$data')");
    $conn->close();
    header("location: ../confirmareMesajTrimis.php");
    die();
}