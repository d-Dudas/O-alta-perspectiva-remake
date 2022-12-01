<?php

function verifyInputs($username, $email, $password) {

    if(!preg_match("/^(?=.{3,16}$)[a-z0-9_-]+/i", $username))
        return false;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        return false;
    
    $uppercase = preg_match('@[A-Z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if(!$uppercase || !$number || strlen($password) < 8 || strlen($password) > 15)
        return false;

    return true;
}

function emailExists($conn, $e) {

    $eExists = $conn->query("SELECT * FROM accounts WHERE email = '$e'");
    if($eExists)
    {
        if($eExists->num_rows > 0){
            return true;
        }
    }

    return false;
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

function confirmationEmail($email, $vkey){
    $to = $email;
    $subject = "Confirmare adresă mail";
    $txt = "Pentru a vă confirma adresa de email, da-ți click pe următorul link: <a href='http://localhost/O%20alta%20perspectiva%20remake/verifyMail.php?vkey=$vkey'>Confirmă această adresă mail</a>";
    $headers = "From: oaltaperspeciva@gmail.com" . "\r\n" .
        "Content-type:text/html;charset=UTF-8";

    mail($to,$subject,$txt,$headers);
}

if(isset($_POST['usernameR'])){    

    $u = $_POST['usernameR'];
    $e = $_POST['emailR'];
    $p = $_POST['pwdR'];

    // Dacă cumva niște inputuri care nu coincid cu cerințele propuse
    // reușesc să treacă de verificările JavaScript, sunt din nou filtrate
    // și pe partea de server.
    if(!verifyInputs($u, $e, $p)) 
        die("Something went wrong.");

    $vkey = md5(time().$u);
    $p = md5($p);

    include './dbc.inc.php';
    $conn = dbConnect();

    // Dacă există deja un cont asociat cu această adresă de mail
    // atunci se returnează un mesaj de eroare.
    if(emailExists($conn, $e)) {
        $conn->close();
        header("location: ../index.php?register=show&error=email");
        die();
    }

    // Dacă există deja un cont asociat cu aceast username
    // atunci se returnează un mesaj de eroare.
    if(usernameExists($conn, $u)) {
        $conn->close();
        header("location: ../index.php?register=show&error=username");
        die();
    }

    $insert = $conn->query("INSERT INTO accounts (username, password, email, vkey) VALUES ('$u','$p','$e','$vkey')");
    $conn->close();
    
    if($insert) {

        confirmationEmail($e, $vkey);

        header('location:../emailSent.php');
        die();

    } else {
        die("Something went wrong.");
    }

} else die("Something went wrong.");

?>