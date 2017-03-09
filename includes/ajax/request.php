<?php

require_once("../database.php");
date_default_timezone_set('America/Chicago');

$item = mysqli_real_escape_string($conn, $_POST['item']);
$system = mysqli_real_escape_string($conn, $_POST['system']);
//echo "<script type=\"text/javascript\">console.log(\"".$system."\")</script>";
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
$supplier = mysqli_real_escape_string($conn, $_POST['supplier']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
if ($quantity == "") {
    $quantity = 0;
}
$cost = mysqli_real_escape_string($conn, $_POST['cost']);
if ($cost == "") {
    $cost = 0;
}
$priority = mysqli_real_escape_string($conn, $_POST['priority']);
$userId = mysqli_real_escape_string($conn, $_POST['user']);
$link = mysqli_real_escape_string($conn, $_POST['link']);
$location = mysqli_real_escape_string($conn, $_POST['location']);

$query = "SELECT * FROM users WHERE id=".$userId;
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$teamId = $user['team_id'];


$dateAdded = date('Y-m-d', time());

$query = "INSERT INTO financial_package (item, system, item_disc, date_added, bom_supplier, est_quantity, est_individual_cost, shipping_priority, user_id,  team, status, link, shipping_location)
          VALUES ('".$item."','".$system."', '".$desc."', '".$dateAdded."', '".$supplier."', ".$quantity.", ".$cost.", ".$priority.", ".$userId.", ".$teamId.", 0, '".$link."', ".$location.")";


mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "success";
} else {
    echo "fail";
};



/*
$message = "There is a new purchase request";
$room = "kkfisher3"; 
$icon = ":moyai:"; 
$username = "George the Purchasing Bot";
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


