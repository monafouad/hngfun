<?php

$error = "";
$name = "";

// hng.fun/sendmail.php?password=spamblocker&subject=Hello&body=The email body&to=victorugwueze@gmail.com
if(isset($_POST['submit'])){
		$body = "Mail From\n ";
		$subject = $_POST['subject'];
		$name = $_POST['name'];
		$to = $_POST['email'];
		$body .=$name."\n ";
		$body .= $_POST['body'];

	if(!isset($body) || empty($body) ||!isset($to) ||empty($to) || !isset($subject) ||empty($subject)){
		$error = "Email and message field must be filled ";
		header("location:index.php?error=".urldecode($error));
	}else{
		
	
		 // $db_config = require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
		 $db_config = require_once('../../config.php');

		 $pdo = new PDO(
		 	"mysql:host=".$db_config['host'].";
		 	dbname=".$db_config['dbname'],
		 	 $db_config['username'],
		 	 $db_config['pass']
		 	);
		 $query = "SELECT * FROM password LIMIT 1";
		 $result = $pdo->fetch($query);
		 $password = $result['password'];

		 $send = "../../sendmail.php?to=$to&body=$body&subject=$subject&password=$password";
		 header("location:".$send);


		 echo $to."<br>";
		 echo $subject."<br>";
		 echo $body;
	}

}
