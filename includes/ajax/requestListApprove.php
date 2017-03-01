<?php

require_once("../database.php");

$id = $_POST['id'];
echo "<script type=\"text/javascript\">console.log(\"".$id."\")</script>";

$value = "Hi";
echo "<script type=\"text/javascript\">console.log(\"".$value."\")</script>";
echo "Hi";

$query = "UPDATE financial_package SET status = 1 WHERE id = ".$id;
mysqli_query($conn, $query);


/*
$purchasers_name = "Elon Musk";
$amount = "500 dollars";

$message = "Hello! There is a new order from ".$purchasers_name." for $".$cost; 
$room = "kkfisher3"; 
$icon = ":moyai:"; 
$username = "Purchasing bot";
$data = "payload=" . json_encode(array(         
        "channel"       =>  "@{$room}",
        "text"          =>  $message,
        "icon_emoji"    =>  $icon,
        "username"      =>  $username
    ));
$url = "https://hooks.slack.com/services/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";
         
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
echo var_dump($result);
if($result === false)
{
    echo 'Curl error: ' . curl_error($ch);
}
 
curl_close($ch);
*/
?>

