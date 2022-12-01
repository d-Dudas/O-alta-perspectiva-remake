<?php
session_start();
$_SESSION['username'] = "";
session_destroy();
unset($_COOKIE['email']); 
setcookie('email', null, -1, '/');
unset($_COOKIE['username']); 
setcookie('username', null, -1, '/');
unset($_COOKIE['cookieKey']); 
setcookie('cookieKey', null, -1, '/');
header("location: ../index.php");
die();