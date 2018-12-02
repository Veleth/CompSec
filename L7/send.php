<?php
require_once ("myPage.php");
    session_start();
	$site = new myPage();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $from = $_POST['from'];
        $to = $_POST["to"]; 
        $amo = $_POST["amount"];
        $db = $site->connect();
        $sql = "INSERT INTO `transactions` VALUES ('$from', '$to', NOW(), '$amo', 'pending', NULL)";
        if (strpos($sql, ';') == false){
            mysqli_query($db,$sql);
            header('Location: '.'login.php');
            die();
        }
        if (mysqli_multi_query($db,$sql))
        {
          do
            {
            // Store first result set
            if ($result=mysqli_store_result($db)) {
              // Fetch one and one row
              while ($row=mysqli_fetch_row($result))
                {
                printf("%s\t%s\t%s\t%s\n",$row[0], $row[1], $row[2], $row[3], $row[4]);
                }
              // Free result set
              mysqli_free_result($result);
              }
            }
          while (mysqli_next_result($db));
          
        }
        else{
            ob_start();
            header('Location: '.'login.php');
            ob_end_flush();
            die();
        }
        
    }
    else{
        ob_start();
        header('Location: '.'login.php');
        ob_end_flush();
        die();
    }
?>