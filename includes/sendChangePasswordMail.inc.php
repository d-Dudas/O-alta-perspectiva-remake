<?php 
    function daysElapsed($from) {

        date_default_timezone_set('Europe/Bucharest');
        $userTimezone = "Europe/Bucharest";
        $timezone = new DateTimeZone( $userTimezone );
        $crrentSysDate = new DateTime(date('m/d/y H:i:s'),$timezone);
        $userDefineDate = $crrentSysDate->format('m/d/y H:i:s');
        $start = date_create(date('m/d/y H:i:s', strtotime($from)),$timezone);
        $end = date_create($userDefineDate,$timezone);

        $diff=date_diff($start,$end);

        return $diff->d;
    }

    function sendEmail($email, $vkey){
        $to = $email;
        $subject = "Parolă nouă";
        $txt = "Pentru a vă schimba parola, dați click pe următorul link: <a href='http://localhost/O%20alta%20perspectiva%20remake/changePassword.php?vkey=$vkey&email=$email'>Shimbă parola</a>";
        $headers = "From: oaltaperspeciva@gmail.com" . "\r\n" .
            "Content-type:text/html;charset=UTF-8";

        mail($to,$subject,$txt,$headers);
    }

    if(isset($_POST["email"])) {
        $email = $_POST["email"];
        include './dbc.inc.php';
        $conn = dbConnect();
        $acc = $conn->query("SELECT * FROM accounts WHERE email='$email'");
        $acc = $acc->fetch_assoc();
        if(is_array($acc)) {
            
            // Dacă în ultimele 24 de ore a fost deja trimis un mail de schimbare a parolei, și care nu a fost folosit încă, atunci nu se mai poate cere alt mail.
            $ifExists = $conn->query("SELECT * FROM changepasswordkeys WHERE email = '$email' ORDER BY requestDate DESC LIMIT 1")->fetch_assoc();
            if(is_array($ifExists)) {
                if(daysElapsed($ifExists["requestDate"]) < 2 && $ifExists["used"] == 0) {
                    header("location: ../requestPasswordChange.php?error=emailSent");
                    die();
                }
            } 
            

            $vkey = md5($email.date("d/m/yy h:i:s"));
            $conn->query("INSERT INTO changepasswordkeys (email, vkey) VALUES ('$email','$vkey')");
            $conn->close();
            sendEmail($email, $vkey);

            header("location: ../confirmEmailSentForPasswordChange.php");
            die();

        } else {
            header("location: ../requestPasswordChange.php?error=email");
            die();
        }
    } else {
        header("location: ../home.php");
        die();
    }
?>