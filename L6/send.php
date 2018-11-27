<?php
require_once ("myPage.php");
    session_start();
	$site = new myPage();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $from = $_POST['from'];
        $to = $_POST["to"]; 
        $amo = $_POST["amount"];
        $db = $site->connect();
        $sql = "INSERT INTO `transactions` VALUES ($from, $to, NOW(), $amo, 'pending', NULL)";
        mysqli_query($db, $sql);
    }
    ob_start();
    header('Location: '.'login.php');
    ob_end_flush();
    die();
?>