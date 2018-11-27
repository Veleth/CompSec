<?php
require_once ("myPage.php");

	session_start();
	unset($_SESSION['login']);
	$site = new myPage();
	
	echo $site->indexPage("");
	
?>