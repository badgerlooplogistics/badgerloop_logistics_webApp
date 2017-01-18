<?php

require_once("includes/database.php");
require 'vendor/autoload.php';


// if form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    $query = "SELECT id FROM users WHERE email='{$email}'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    $userId = $user['id'];

    // CHANGE LINK IF NEW URL
    $link = "http://87.238.173.173/~badgerloop/newpassword.php?id=".$userId."&code=".$randomString;

    // save random string to db
    $query = "UPDATE users SET secret_code = '{$randomString}' WHERE id={$userId}";
    mysqli_query($conn, $query);

    $to = "gwozdz@wisc.edu"; // TESTING
    $subject = "Forgot password Badgerloop Logistics";
    $txt = "Please click the following link to change your password: ".$link;
    $headers = "From: info@badgerloop.com";

 
    mail($to,$subject,$txt,$headers);
    
    
    //testing
    
    $sendgrid = new SendGrid(_aHQwNYpRp6zF2P1SYMRTA);
    $email = new SendGrid\Email();

    $email->addTo("gwozdz@wisc.edu")
          ->setFrom("gwozdz@wisc.edu")
          ->setSubject("Sending with SendGrid is Fun")
          ->setHtml("and easy to do anywhere, even with PHP");

    $sendgrid->send($email);
}

?>
<!doctype html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
    <!--    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body id="loginPage">
<div>
    <header>

    </header>
    <div id="loginPage">
        <form action="" method="post">
            <h1 id="loginHeader">Forgot Password</h1>
            <input id="loginHeader" type="email" placeholder=" Email" name="email" required autofocus><br>
            <input id="loginHeader" type="submit" class="btn btn-primary" value="Submit">
        </form><br />
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            echo "Your request has been submitted. Please check your email.<br />";
        }
        ?>
    </div>
    <footer>

    </footer>
</div>
</body>
</html>