<?php 
// If the page is accesed from unknown sources, then
// transfer the user to the home page
if(!isset($_POST["preferences"]) || !isset($_POST["usrId"]))
{
    header("location:../home.php");
    die();
}

// Get the user's id
$id = $_POST["usrId"];
// Get the array of preferences and transform the array in json
$preferences = json_encode($_POST["preferences"]);
print_r($preferences);

// Include the database connection file and
// create the connection
include "./dbc.inc.php";
$conn = dbConnect();

// Update the database
$conn->query("UPDATE accounts SET preferences = '$preferences' WHERE id = '$id'");

// Don't forget to close the connection
$conn->close();

// Return to the home page
header("location:../home.php");
die();

?>