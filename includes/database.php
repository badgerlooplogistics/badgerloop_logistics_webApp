<?php

    $servername = getenv('IP');
    $username = "badgerlooplogist";
    $password = "badgers28";
    $database = "badgerloop_db";
    $dbport = 3306;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    

?>