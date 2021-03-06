<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Femi Ojo</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .card {
      max-width: 600px;
      margin: auto;
      text-align: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow: hidden !important;
      background-color: #e6e6e6
    }

    .container {
      margin: 0 auto;
      max-width: 1170px;
      padding: 0 20px;
      width: 100%;
      box-sizing: border-box;
    }

    h1 {
      font-size: 68px;
      font-weight: normal;
      margin: 0;
    }

    h3 {
      font-style: italic;
      margin-bottom: 0;
      font-weight: normal;
    }

    .title {
      color: grey;
      font-size: 20px;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    .social {
      text-decoration: none;
      margin-top: 0;
    }

    p {
      font-size: 18px;
    }

    ul {
      text-align: left
    }

    #profile-image {
      border-radius: 6px;
    }

    #email {
      border: 0.5px dotted #888;
    }

    input,
    textarea,
    select,
    button {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-color: #000;
    }

    #email{
      margin: 5px auto 10px;
    }

    #email-form-name,
    #email-form-toAddress,
    #email-form-emailMessage {
      width: 90%;
      height: auto;
      margin: 5px auto 10px;
      padding: 10px;
      background: #fff;
      border: 2px solid #ccc;
    }

    #email-form-submit {
      color: #fafafa;
      padding: 10px;
      float: right;
      cursor: pointer;
      background-color: #666;
      border: none;
    }
  </style>
</head>

<body>
  <div class="card">
    <h1>Femi Ojo</h1>
    <h3 class="social">Connect with me...
      <br>
      <a href="https://twitter.com/mrfojo" target="_blank"><i class="fa fa-twitter"></i></a>
      <a href="https://www.linkedin.com/in/olorunfemi-ojo-393a7535/" target="_blank"><i class="fa fa-linkedin"></i></a>
      <a href="https://github.com/mrfojo" target="_blank"><i class="fa fa-github"></i></a>
      <a href="https://hnginterns.slack.com/team/mrfojo" target="_blank"><i class="fa fa-slack"></i></a>
      <a href="#email"><i class="fa fa-envelope"></i></a>
    </h3>
    <br>
    <img src="http://i.imgur.com/OavH6EV.png" alt="Me" id="profile-image">
    <div class="container">
      <p class="title">Lagos, Nigeria</p>
      <p>Fullstack C# Developer.
        <br>Microsoft <i class="fa fa-windows"></i> Enthusiast.
        <br>Enjoy debugging code, taking long walks and watching TV shows.
        <br>Interested in machine learning and image processing
      </p>
      <ul>
        <li>
          <a href="https://github.com/MrFojo/hngStage1" target="_blank">Stage 1: PHP Read from db</a>
        </li>
        <li>
          <!--<a href="https://drive.google.com/file/d/0B-l1szh2ifN-WUsyU3EyQ2d4NnM" target="_blank">Stage 3: Android Profile App</a>-->
          <a href="https://drive.google.com/open?id=0B-l1szh2ifN-VXFIN1lBZktGQm8" target="_blank">Stage 3: Android Profile App</a>
        </li>
      </ul>
      <div id="email">
        <h4>Send Me An Email</h4>
        <form name="email-form" action="" method="post">
          <input id="email-form-name" name="name" placeholder="Subject" size="30" type="text" value="" />
          <br>
          <input id="email-form-toAddress" name="toAddress" placeholder="Email Address" size="30" type="text" value="" />
          <br>
          <textarea cols="25" id="email-form-emailMessage" name="emailMessage" placeholder="Message" rows="5"></textarea>
          <br>
          <input id="email-form-submit" type="submit" name="submit" value="Send">
          <br>
          <div style="text-align: center; width: 100%;">
            <br />
            <div id="email-form-error-message">
            </div>
            <div id="email-form-success-message">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
  if(isset($_POST['submit'])){
    //console_log($_POST);
    $to = $_POST["toAddress"];
    $subject = $_POST["name"];
    $message = $_POST["emailMessage"];
    if(isset($to) && isset($message)){


      $servername = 'localhost';
      $username = 'intern';
      $password = '@hng.intern1';  
      $dbname = 'hng';  
  

      $conn = new mysqli($servername, $username, $password, $dbname);

      if($conn->connect_error){
        //console_log("Connection failed: ". $conn->connect_error);
        return;
      }
      //console_log("Connected successfully");
      $sql = "SELECT * FROM password LIMIT 1";
      $result = $conn->query($sql);
      //console_log($result);
       $emailPassword = "";
      if(!$result){
        //console_log("No record found");
      }
      else{
        if($row = $result->fetch_assoc()) {
          $emailPassword = $row["password"];
          //console_log($emailPassword);
          $requestUrl = "/sendmail.php?password=$emailPassword&subject=$subject&body=$message&to=$to";
          //console_log($requestUrl);
          header("Location: $requestUrl");
       }
      }
      //console_log("echoed");
    }
  }
  
  // function console_log( $data ){
  //   echo '<script> debugger;';
  //   echo 'console.log('. json_encode( $data ) .')';
  //   echo '</script>';
  // }

?>