<?php
require_once ("myPage.php");
	
	session_start();
	$site = new myPage();
	if (isset($_SESSION['login'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $a1 = test_input($_POST['from']);
			$a2 = test_input($_POST["to"]); 
            $amo = test_input($_POST["amount"]);
            $bal = test_input($_POST["balance"]);
            $errno = 0;
            echo $site->confirmationPage($a1, $amo, $a2, $bal, $errno);
        } 
        else{
            echo "Something went wrong";
        } 
    }
    else{
        ob_start();
        header('Location: '.'index.php');
        ob_end_flush();
        die();
    }

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>