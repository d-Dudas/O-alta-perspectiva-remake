<?php

function sendEmail($email, $vkey){
    $to = $email;
    $subject = "Confirmare cont";
    $txt = "a href='http://localhost/O%20alta%20perspectiva%20remake/verifyMail.php?vkey='$vkey'>Confirmă această adresă de mail</a>";
    $headers = "From: oaltaperspeciva@gmail.com" . "\r\n" .
        "Content-type:text/html;charset=UTF-8";

    mail($to,$subject,$txt,$headers);
}

if(isset($_POST['email'])){
    $e = $_POST['email'];
    $p = $_POST['pwd'];

    include './dbc.inc.php';
    $conn = dbConnect();

    $p = md5($p);

    $u = $conn->query("SELECT id, username, password, ifAdmin, verified, vkey FROM accounts WHERE email = '$e' LIMIT 1");
    if($u) {
        if($u->num_rows > 0) {
            $u = mysqli_fetch_assoc($u);
            if($p != $u['password']){
                $conn->close();
                header("location: ../index.php?login=show&error=loginPwd");
                die();
            }

            //Dacă contul nu este verificat, atunci se trimite încă o dată linkul pentru verificarea contului.
            if($u['verified'] == 0) {
                $conn->close();
                sendEmail($e, $u['vkey']);
                header("location: ../index.php?login=show&error=loginAccNotVerfied");
                die();
            }

            $u = $u['username'];
            $id = $u['id'];
            $ifAdmin = $u['ifAdmin'];

            session_start();
            $_SESSION['username'] = $u;
            $_SESSION['id'] = $id;
            $_SESSION['ifAdmin'] = $ifAdmin;
            if(isset($_POST['keepSignedIn'])) {
                if($_POST['keepSignedIn'] == "on"){
                    $cookieKey = md5(time().$u);
                    setcookie("email", $e, time() + 60*60*24*7, '/');
                    setcookie("username", $u, time() + 60*60*24*7, '/');
                    setcookie("cookieKey", $cookieKey, time() + 60*60*24*7, '/');
                    $insert = $conn->query("INSERT INTO loginCookies (email, username, cookieKey) VALUES ('$e','$u','$cookieKey')");
                    if(!$insert) {
                        $conn->close();
                        die("Something went wrong");
                    }
                }
            }
            $conn->close();
            header("location: ../home.php");

        }
        else {
            $conn->close();
            header("location: ../index.php?login=show&error=loginEmail");
            die();
        }
    }
}
else die("Something went wrong.");