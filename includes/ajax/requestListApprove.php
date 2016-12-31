<?php

require_once("../database.php");

$id = $_POST['id'];


$query = "UPDATE financial_package SET status = 1 WHERE id = ".$id;
mysqli_query($conn, $query);
?>