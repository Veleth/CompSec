<?php
    require_once ("myPage.php");
    session_start();
	$site = new myPage();
    
    if (isset($_SESSION['login'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $a1 = $site->test_input($_POST['from']);
			$a2 = $site->test_input($_POST["to"]); 
            $amo = $site->test_input($_POST["amount"]);
            $ID = $site->test_input($_POST["ID"]);
            $site->reject($a1, $a2, $amo, $ID);
        }
        ob_start();
		header('Location: '.'login.php');
		ob_end_flush();
		die();
    }
    else{
        ob_start();
        header('Location: '.'index.php');
        ob_end_flush();
        die();
    }
?>