<?php

require_once("../database.php");
date_default_timezone_set('America/Chicago');

$item = mysqli_real_escape_string($conn, $_POST['item']);
$system = mysqli_real_escape_string($conn, $_POST['system']);
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
}