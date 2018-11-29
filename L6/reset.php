<?php
require_once ("myPage.php");
	$site = new myPage();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $mail = $site->test_input($_POST['email']);
        $pass = $site->genPass();
        $hashed = password_hash($pass, PASSWORD_BCRYPT);
        $site -> changePass($mail, $hashed);
        echo "If the email is in the base, the password has been **SENT TO IT** (and changed to $pass)";
    }
    else{
        ob_start();
        header('Location: '.'index.php');
        ob_end_flush();
        die();
    }
?>