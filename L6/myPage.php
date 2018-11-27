<?php
class myPage {

	public function indexPage($al){
		$bt = debug_backtrace();
		$name = basename($bt[0]['file'], '.php');
		
		$s = file_get_contents("resources/login.html");
		$s = str_replace("<!--%alert%-->", $al, $s);
		return $s;
	}
	
	public function welcomePage(){
		$s = file_get_contents("resources/hello.html");
		$db = $this->connect();
		$sql = "SELECT * FROM customers WHERE username='".$_SESSION['login']."'";
        $result = mysqli_query($db, $sql);
        $row = $result->fetch_row();
        $s = str_replace("%name%", $row[1], $s);
        $s = str_replace("%accno%", $row[0], $s);
		$s = str_replace("%money%", $row[4], $s);
		$tmp = $this->getTransactions($row[0]);
		$s = str_replace("%tr%", $tmp, $s);
        return $s;
	}

	public function confirmationPage($a1, $amo, $a2, $bal, $errno){
		$s = file_get_contents("resources/confirm.html");
		$s = str_replace("%acc1%", $a1, $s);
		$s = str_replace("%money%", $amo, $s);
		$s = str_replace("%bal%", $bal, $s);
		$s = str_replace("%acc2%", $a2, $s);
		if ($errno ==0){
			$s = str_replace("%al%", "", $s);
		}
		else{
			if ($errno == 1){
				$a = "<ra>You provided something that is not a number. Please go back and try again</ra>";
				$s = str_replace("%al%", $a, $s);
				$s = str_replace('<button id="yes">Confirm</button>', "", $s);
			}
		}
		return $s;
	}
	
	public function resetpage($al){
		$s = file_get_contents("resources/reset.html");
		$s = str_replace("%al%", $al, $s);
		return $s;
	}
	
	public function connect(){
		$user = 'root';
		$pass = '';
		$db = 'mydb';
		$db = new mysqli('localhost', $user, $pass, $db) or die("Database connection could not be established");
		return $db;
	}
	
	public function tryLogin($nick, $pass){
		$db = $this->connect();
		$sql = "SELECT * FROM customers WHERE username='".$nick."'";
		$result = mysqli_query($db, $sql);
		if (!$result){
			return 0;
		}
		$row = $result->fetch_row();
		$s = $row[1];
		$hashed = $row[3];
		if(password_verify($pass, $hashed) == 1){
			if($s = $nick){
				return 1;
			}
		}
		return 0;
	}

	public function register($nick, $mail, $pass){
		$hashed = password_hash($pass, PASSWORD_BCRYPT);
		$db = $this->connect();
		$sql = "INSERT INTO `customers` VALUES (NULL, '".$nick."', '".$mail."', '".$hashed."', 100)";
		mysqli_query($db, $sql);
		return 1;
	}

	public function genPass(){
        $pass = hash('sha512', time());
        $c = rand(5,20);
        for ($i = 0; $i < $c; $i++){
            $l = rand(30,120);
            $pass = substr($pass, 0, $l);
            $pass = hash('sha512', $pass);
        }
        $l = rand(20,30);
        $pass = substr($pass, 0, $l); 
        return $pass;
    }

	public function changePass($mail, $pass){
		$db = $this->connect();
		$sql = "UPDATE `customers` SET `password` = '".$pass."' WHERE email ='".$mail."'";
		mysqli_query($db, $sql);
		return 1;
	}

	public function findMatch($nick, $mail){
		$db = $this->connect();
		$sql = "SELECT * FROM customers WHERE (username='".$nick."' OR email='".$mail."')";
		$result = mysqli_query($db, $sql);
		if(mysqli_num_rows($result)>0){
			return 1;
		}
		return 0;
	}
	
	public function getTransactions($acc){
	 $s = "";
	 $tmp = file_get_contents("resources/transaction.html");
	 #[0] - from, [1] - to, [2] - time, [3] - amount, [4] - status
	 $db = $this->connect();
	 $sql = "SELECT * FROM transactions WHERE (sender = '".$acc."' OR reciever = '".$acc."') AND `status` = 'complete' ORDER BY `time` DESC";
	 $result = mysqli_query($db, $sql);
	 while($row = $result->fetch_row()){
		$s .= $tmp;
		$s = str_replace("%0%", $row[0], $s);
		$s = str_replace("%1%", $row[1], $s);
		$s = str_replace("%2%", $row[2], $s);
		$s = str_replace("%3%", $row[3], $s);
		$s = str_replace("%4%", $row[4], $s);
		}
	 return $s;
  }

  function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
}

?>