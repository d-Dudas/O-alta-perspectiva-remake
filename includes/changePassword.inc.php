<?php

    // Functia returneaza numarul de zile
    // dintre data $from si data curenta 
    function daysElapsed($from) {

        print_r($from);

        date_default_timezone_set('Europe/Bucharest');

        $userTimezone = "Europe/Bucharest";
        $timezone = new DateTimeZone( $userTimezone );

        $crrentSysDate = new DateTime(date('m/d/y H:i:s'),$timezone);
        $userDefineDate = $crrentSysDate->format('m/d/y H:i:s');
        print_r(date('Y-m-d H:i:s', strtotime($from)));
        $start = date_create(date('y-m-d H:i:s', strtotime($from)),$timezone);
        $end = date_create($userDefineDate,$timezone);

        echo "<br>";
        print_r($start);
        echo "<br>";
        print_r($end);

        $diff=date_diff($start,$end);

        return $diff->d;
    }

    if (isset($_POST["pwd"])) {

        $pwd = $_POST["pwd"];
        $pwdConfirm = $_POST["pwdConfirm"];
        $email = $_POST["email"];
        $vkey = $_POST["vkey"];
        
        // If, for some reason, the pwd and pwdConfirm are not the same, then exit;
        if($pwd != $pwdConfirm) die("Something went wrong");
        
        include './dbc.inc.php';
        $conn = dbConnect();
        $verifyKey = $conn->query("SELECT * FROM changepasswordkeys WHERE email = '$email' and used=0 ORDER BY requestDate LIMIT 1")->fetch_assoc();
        

        // If in the database isn't any unused request for this email, then exit.
        if(!is_array($verifyKey)) {
            $conn->close();
            header("location: ../requestPasswordChange.php?error=linkExpired");
            die();
        }

        // Dacă au trecut două sau mai multe zile de cererea de
        // schimbare a parolei, atunci trebuie să fie făcută
        // o altă cerere
        // Dacă vkey-ul nu este valid, atunci trebuie să fie
        // făcută o altă cerere
        if(daysElapsed($verifyKey['requestDate']) > 1 || $verifyKey["vkey"] != $vkey) {
            $conn->close();
            header("location: ../requestPasswordChange.php?error=linkExpired");
            die();
        } else {
            $pwd = md5($pwd);
            $conn->query("UPDATE accounts SET password='$pwd' WHERE email='$email'");
            $conn->query("UPDATE changepasswordkeys SET used='1' WHERE email='$email' AND vkey = '$vkey'");
            $conn->close();
            header("location: ../index.php?login=show");
            die();
        }
    }
    else {
        header("location: ../home.php");
        die();
    }
?>