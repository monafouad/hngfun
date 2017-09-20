<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
   $error = [];
  $subject = $_POST['subject'];
   $to  = 'bssjone26@gmail.com';
   $body = $_POST['body'];
  if($body == '' || $body == ' ') {
     $error[] = 'Message cannot be empty.';
   }
  if($subject == '' || $subject == ' ') {
     $error[] = 'Subject cannot be empty.';
   }
  if(empty($error)) {
    $config = include __DIR__ . "/../config.php";
     $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
     $con = new PDO($dsn, $config['username'], $config['pass']);
    $exe = $con->query('SELECT * FROM password LIMIT 1');
     $data = $exe->fetch();
     $password = $data['password'];
    $uri = "/sendmail.php?to=$to&body=$body&subject=$subject&password=$password";
    header("location: $uri");
  }
 }
?>


<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
<title>Hogan</title>
<link rel="shortcut icon" href="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-0/p526x296/21740404_375541216197595_8975238026865032447_n.jpg?oh=51d64b5b0c3cf62726fc34573c7ebd15&oe=5A5B44C3">

<style>
#body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}
#header {
    background-color:teal;
    color:white;
    text-align:center;
    padding:30px;
}
#section {
    height: 1280px;
    width:1000px;
    float:center;
    padding:0 120px;
    font-size: 20px;
}
#footer {
    background-color:teal;
    color:white;
    clear:both;
    text-align:center;
    padding:20px;
}

.contact {
            text-align: center;
            font-size: 15px;
        }
        .profile-body li {
            display: inline-table;
            margin-bottom: 10px;
        }
        .contact span img {
            width: 20px;
            vertical-align: middle;
            margin-right: 5px;
            margin-left: 5px;
        }
        #hogan-form {
            background-color: rgb(153, 255, 235);
            margin-bottom: 20px;
        }
        .form-wrapper {
            display: table;
            padding: 20px;
            margin-top: 20px;
            width: 90%;
        }
        #hogan-form .horz label,
        #hogan-form .horz input {
            display: block;
        }
        .form-wrapper label {
            text-transform: capitalize;
            font-family: Tahoma;
            font-size: 18px;
            margin-bottom: 5px;
            cursor: pointer;
        }
        .form-wrapper input {
            padding: 6px 12px;
            width: 90%;
        }
        .horz {
            margin-top: 10px;
        }
        .horz:first-child {
            margin-top: 0;
        }
        .form-wrapper textarea {
            width: 90%;
            height: 100px;
            resize: none;
            padding: 10px;
            overflow: auto;
        }
        .form-wrapper textarea,
        .form-wrapper input {
            font-size: 17px;
            border: 0;
            outline: 0;
        }
        .form-wrapper textarea:focus,
        .form-wrapper input:focus {
            background-color: #fff;
            color: #000;
        }
        .form-wrapper textarea:hover,
        .form-wrapper input:hover {
            background-color: #fff;
        }
        .form-wrapper input[type="submit"] {
            background-color: #00997a;
            padding: 10px 10px;
            display: inline-block;
            cursor: pointer;
            background-color: rgb(0, 153, 122);
            color: #fff;
            width: auto;
            border-radius: 5px;
        }
        .contact-success-msg {
            padding: 20px;
            margin-top: -20px;
            margin: -20px -20px 0 -20px;
            text-align: center;
            font-size: 17px;
            color: #f9f9f9;
        }       
@media only screen and (max-width: 500px) {
    .body {
        box-sizing: border-box;
        width: 100%;
        padding: 15px;
        background-color: transparent;
    }
}
@media only screen and (max-width: 500px) {
    .section{
        box-sizing: border-box;
        width: 100%;
        padding: 15px;
        background-color: transparent;
</style>
</head>
<body>
    
<div id="header">
<h1> Hotels.ng Internship 2017</h1>
</div>

<div id="section">   
<div>
<center>
<img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/21730820_375540992864284_3701375902095186628_n.jpg?oh=ce868d37cc7f48b25e346522ecd95804&oe=5A150A19" alt="Hotels" style="width:300px;height:300px;border:0;">
<h1>About Me</h1>
<p>HI! I'm <strong>Essien Hogan</strong>. I have passion for Web and Software development because it helps me express my creativity and solve problems.</p>
<!--<img src="images/i.png" alt="Hotels" style="width:40px;height:40px;border:0;">-->
<h4>Slack Username: @hogan26</h4>

<div class="name" id="contact"><h2>Contact Me</h2></div><hr/>
                <form  id="hogan-form" action="hogan26.php" method="post">
                    <div class="form-wrapper">
                        <div class="horz">
                            <label for="form-name">Name:</label>
                            <input type="text" id="form-name" name="visitor-name" required />
                        </div>
                        <div class="horz">
                            <label for="form-mail">Email:</label>
                            <input type="email" id="form-mail" name="visitor-email" required />
                        </div>
                       <div class="horz">
                            <label for="form-tel">Phone Number:</label>
                            <input type="tel" id="form-tel" name="visitor-tel" required />
                        </div>
                        <div class="horz">
                            <label for="form-topic">Subject:</label>
                            <input type="text" id="form-topic" name="visitor-subject" required />
                        </div>
                        <div class="horz">
                            <label for="form-msg">Message:</label>
                            <textarea name="body" id="form-msg" name="visitor-msg" required></textarea>
                        </div>
                        <div class="horz">
                            <input type="submit" value="Send Message" />
                        </div>
                    </div>
                </form>
<h2>Connect With Me On:</h2> 
<hr>
<a href="https://www.facebook.com/essienhoganofficial">
  <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/21731033_375548382863545_4392935334918929782_n.jpg?oh=1e8e4bb234b549fb011bf9a7fe60378a&oe=5A4D973B" alt="Hotels" style="width:40px;height:40px;border:0;">
</a>
<a href="https://twitter.com/bssjone26">
<img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/21751796_375548602863523_7770617408061950628_n.jpg?oh=aa17ec73d98aa7e04a5575e957393b54&oe=5A5B2FF3" alt="Hotels" style="width:40px;height:40px;border:0;">
</a>
<a href="https://hnginterns.slack.com/messages/C6Q2U2G0Y/team/hogan26/">
  <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/21730991_375548069530243_93366706774071661_n.jpg?oh=77a5c39886c50ade87b4d9b9d3161ef6&oe=5A499BC7" alt="Hotels" style="width:40px;height:40px;border:0;">
</a>
<a href="https://github.com/blueseedhub">
  <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/21751629_375550956196621_7131230404690374069_n.jpg?oh=98d077fede9655ca2ea5bcf733d8a1de&oe=5A15B2F1" alt="Hotels" style="width:40px;height:40px;border:0;">
</a>
<a href="https://www.collaborizm.com/profile/SJ2ZQo5T">
  <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-9/21743384_375551082863275_3520000009404635165_n.jpg?oh=23073244052b50ef455c5ec48c3840ea&oe=5A5D6C4E" alt="Hotels" style="width:40px;height:40px;border:0;">
</a>
</center>
</div>
</div>

<div id="footer">   
&copy; Copyright 2017 HNG Internship
</div>

</body>
</html>