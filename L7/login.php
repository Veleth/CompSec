<?php
require_once ("myPage.php");
	
	session_start();
	$site = new myPage();
	if (isset($_SESSION['login'])){
		if(!strcmp($_SESSION['login'],"administrator")){
			
			echo $site->adminPanel();
		}
		else{
			echo $site->welcomePage();
		}
	}

	else{
		$nick = $pass = "";
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$nick = $site->test_input($_POST["username"]); 
			$pass = $site->test_input($_POST["password"]); 
			$al = "";
			if($site->tryLogin($nick, $pass) == 0){
				$al.="Para użytkownik/hasło jest błędna";
			}
		
			if($al == ""){
				$_SESSION['login'] = $nick;
				if(!strcmp($_SESSION['login'],"administrator")){
					echo $site->adminPanel();
				}
				else{
					echo $site->welcomePage();
				}
			}
			else{
				$al = "<ra>".$al."</ra>";
				echo $site->indexPage($al);
			}
		}
		else{
			ob_start();
			header('Location: '.'index.php');
			ob_end_flush();
			die();
		}
	}
?>