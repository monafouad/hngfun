<?php
    if(isset($_POST['subject'])){
        $config = [
            'dbname' => 'hng',
            'pass' => '@hng.intern1',
            'username' => 'intern',
            'host' => 'localhost'
        ];
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
        $con = new PDO($dsn, $config['username'], $config['pass']);
        $result = $con->query('SELECT * FROM password');
        $data = $result->fetch();
        $password = $data['password'];
        $subject = $_POST['subject'];
        $body = $_POST['message'];
        header("location:http://hng.fun/sendmail.php?password=".$password."&subject=".$subject."&body=".$body."&to=victorchimobi@yahoo.com");
  
    }else{
        header("location: victorbest34.html");
        header("location: iwa_temmy/iwa_temmy.html");
        header("location: victorbest34.html");
    }
?>
