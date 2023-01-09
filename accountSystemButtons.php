<?php

    include './includes/dbc.inc.php';
    session_start();
    if(!isset($_SESSION['seenArticles'])) 
        $_SESSION['seenArticles'] = array();
    if(isset($_COOKIE["email"]) && isset($_COOKIE["username"]) && isset($_COOKIE["cookieKey"])) {
        $e = $_COOKIE["email"];
        $u = $_COOKIE["username"];
        $ck = $_COOKIE["cookieKey"];
        $conn = dbConnect();
        $result = $conn->query("SELECT * FROM loginCookies WHERE email = '$e' AND username = '$u' AND cookieKey = '$ck' LIMIT 1");
        if($result){
            if($result->num_rows > 0) {
                $result = $conn->query("SELECT * FROM accounts WHERE email = '$e' AND username = '$u' LIMIT 1");
                $username = mysqli_fetch_assoc($result);
                $id = $username['id'];
                $ifAdmin = $username['ifAdmin'];
                $preferences = json_decode($username['preferences']);
                $username = $username["username"];
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $e;
                $_SESSION['id'] = $id;
                $_SESSION['ifAdmin'] = $ifAdmin;
                $_SESSION['preferences'] = $preferences;
            }
        }
        $conn->close();
    }
    if(!empty($_SESSION['username'])) {
        echo '<div id = "buttons">
                <div id = "logoutBtn" class = "btnOutL"><a class = "accSysBtn" href="./includes/disconnect.inc.php">Deconectare</a></div>';
            
        if($_SESSION['ifAdmin'] == 1) {
            echo '<div id = "controlPanelBtn" style = "right: -15%"><a class = "accSysBtn" href="./controlPanel.php">Administrare</a></div>';
        }
        echo '</div>';
    }
    else {
        echo '
        <div id = "buttons">
            <div id = "loginBtn" class = "btnOutL"><a class = "accSysBtn" href="./index.php?login=show">Autentificare</a></div>
            <div id = "registerBtn" class = "btnOutR"><a class = "accSysBtn" href="./index.php?register=show">Înregistrare</a></div>
        </div>
        ';
    }
?>
