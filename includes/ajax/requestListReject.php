<?php

//echo "<script type="text/javascript">console.log(\"".$value."\")</script>";

session_start();
require_once("../database.php");
include 'configure.php';

$value = "Pls work";
echo "<script type=\"text/javascript\">console.log(\"".$value."\")</script>";


$id = $_POST['id'];
$mess = $_POST['mess'];

$query = "UPDATE financial_package SET status = 2 WHERE id = ".$id;
mysqli_query($conn, $query);

// send email
$query = "SELECT user_id FROM financial_package WHERE id=".$id;
$result = mysqli_query($conn, $query);
$request = mysqli_fetch_assoc($result);
$userId = $request['user_id'];

$query = "SELECT * FROM users WHERE id=".$userId;
$result = mysqli_query($conn, $query);
$person = mysqli_fetch_assoc($result);
$email = $person['email'];
$personName = $person['name'];


// get email of TD
$query = "SELECT * FROM users WHERE id=".$_SESSION['user'];
$result = mysqli_query($conn, $query);
$td = mysqli_fetch_assoc($result);
$emailTD = $td['email'];
$tdName = $td['name'];

/*
$value = "Top";
echo "<script>console.log('Top')</script>";
echo "<script>console.log($value)</script>";

echo "<script>console.log\"(".$value."\")</script>";
echo "<script>console.log($value)</script>";
echo "<script>console.log(($value))</script>";
echo("<script>console.log($value)</script>");
echo "\"top\"";
echo("\"top\"");
//print "$value";
echo "<script>console.log(\"$value\")</script>";
echo("<script>console.log('Hello')</script>");
echo("<script>console.log('Top');</script>");


//$to = "gwozdz@wisc.edu";
//$subject = "Purchase Order Request #".$id." denied";
//$txt = $personName.",\n\n   Unfortunately, your request cannot be approved for the following reasons: \n\n      ".$mess."\n\n\n -".$tdName.", Badgerloop Technical Director";
//$headers = "From: ".$emailTD;

//$chat = $slack->chat('@kkfisher3');
//$chat->send('Test');
/*
function slack($message, $channel){
    $ch = curl_init("https://slack.com/api/chat.postMessage");
    $data = http_build_query([
        "token" => "xoxp-144736886548-143951408896-143952102736-d63374c30e0757a0164393091d502f6d",
    	"Just Kody" => $channel, //"#mychannel",
    	"TESTING " => $message, //"Hello, Foo-Bar channel message.",
    	"username" => "kodyfisher15",
    ]);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

*/
?>