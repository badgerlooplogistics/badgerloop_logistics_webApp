<?php

require_once("../database.php");
session_start();

$supplier = mysqli_real_escape_string($conn, $_POST['supplier']);
$cost = mysqli_real_escape_string($conn, $_POST['cost']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$shipping = mysqli_real_escape_string($conn, $_POST['shipping']);
$tax = mysqli_real_escape_string($conn, $_POST['tax']);
$comments = mysqli_real_escape_string($conn, $_POST['comments']);
$date = date('Y-m-d', time());
$id = $_POST['id'];
$userId = $_SESSION['user'];

if ($cost == '') {
    $cost = 0;
}
if ($quantity == '') {
    $quantity = 0;
}
if ($shipping == '') {
    $shipping = 0;
}
if ($tax == '') {
    $tax = 0;
}

$query = "UPDATE financial_package SET act_supplier = '{$supplier}', act_individual_cost = {$cost}, act_quantity = {$quantity}, shipping = {$shipping}, tax = {$tax}, date_purchased = '{$date}', purchased_by = {$userId}, comments = '{$comments}', status = 3 WHERE id = {$id}";
mysqli_query($conn, $query);
// update spent_total

$query = "SELECT user_id FROM financial_package WHERE id={$id}";
$result = mysqli_query($conn, $query);
$userIdArray = mysqli_fetch_assoc($result);
$userId = $userIdArray['user_id'];

$query = "SELECT team_id FROM users WHERE id={$userId}";
$result = mysqli_query($conn, $query);
$userTeam = mysqli_fetch_assoc($result);
$teamId = $userTeam['team_id'];


$query = "SELECT spent_total FROM teams WHERE id = {$teamId}";
$result = mysqli_query($conn, $query);
$team = mysqli_fetch_assoc($result);
$spentTotal = $team['spent_total'];


// calculate total cost
$totalCost = $cost*$quantity + $shipping + $tax;
$newAmount = $spentTotal + $totalCost;

$query = "UPDATE teams SET spent_total = {$newAmount} WHERE id={$teamId}";
mysqli_query($conn, $query);

echo "Hi"
?>