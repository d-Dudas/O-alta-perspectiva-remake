<?php

if(!isset($_POST["username"])){
    header("location:../home.php");
    die();
}

if($_POST["username"] == "" || $_POST["pwd"] == "")
{
    header("location:../home.php");
    die();
}

echo '<p>Hello world</p></br>';

function usrIsAcceptable($username) {

    if(!preg_match("/^(?=.{3,16}$)[a-z0-9_-]+/i", $username))
        return false;

    return true;
}

function usernameExists($conn, $u) {

    $uExists = $conn->query("SELECT * FROM accounts WHERE username = '$u'");
    if($uExists)
    {
        if($uExists->num_rows > 0){
            return true;
        }
    }

    return false;
}

include "./dbc.inc.php";

$newUsr = $_POST["username"];
$usrId = $_POST["usrId"];
$pwd = $_POST["pwd"];
$conn = dbConnect();

if(!usrIsAcceptable($newUsr)){
    $conn->close();
    header("location:../home.php?showAccSettings=true&error=changeUsernameError2");
    die();
}
if(usernameExists($conn, $newUsr)) {
    $conn->close();
    header("location:../home.php?showAccSettings=true&error=changeUsernameError1");
    die();
}

$pwd = md5($pwd);
$u = $conn->query("SELECT id, username, password, ifAdmin, verified, vkey FROM accounts WHERE id = '$usrId' LIMIT 1");
$u = mysqli_fetch_assoc($u);
if($pwd != $u['password']){
    $conn->close();
    header("location:../home.php?showAccSettings=true&error=changeUsernamePwd");
    die();
}

$conn->query("UPDATE accounts SET username = '$newUsr' WHERE id = '$usrId'");
$conn->close();
session_start();
$_SESSION["username"] = $newUsr;
setcookie("username", $newUsr, time() + 60*60*24*7, '/');
header("location:../home.php");
die();

?>