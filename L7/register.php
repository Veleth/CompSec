<?php
require_once ("myPage.php");
	
	session_start();
	$site = new myPage();
	if (isset($_SESSION['login'])){
		echo $site->welcomePage();
	}

	else{
		$nick = $pass = "";
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$nick = $site->test_input($_POST["username"]); 
			$mail = $site->test_input($_POST["mail"]); 
			$pass = $site->test_input($_POST["password"]); 
			$rpass = $site->test_input($_POST["rpassword"]); 
			$al = "";
			if(strlen($nick) < 2 or strlen($nick) > 30){
				$al.="Nazwa użytkownika powinna mieć od 2 do 30 znaków\n";
            }
            
            if(preg_match('/.+@.+\.[a-zA-Z]+/', $mail) == 0){
				$al.="Podany adres mailowy nie jest poprawny\n";
			}	
		
			if(strlen($pass) < 8 or strlen($pass) > 30){
				$al.="Hasło ma mieć długość od 8 do 30 znaków\n";
            }
            
            if(!($pass === $rpass)){
				$al.="Wpisane hasła nie zgadzają się\n";
            }
            
            if($site -> findMatch($nick, $mail) == 1){
                $al.="Nazwa użytkownika lub email są już zajęte";
            }
		
			if($al == ""){
                $site -> register($nick, $mail, $pass);
				$_SESSION['login'] = $nick;
				echo $site->welcomePage();
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