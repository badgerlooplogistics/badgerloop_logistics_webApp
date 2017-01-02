<?php

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"], 1);

    // Create connection
    $conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


    $db['default']['hostname'] = $cleardb_server
    $db['default']['username'] = $cleardb_username
    $db['default']['password'] = $cleardb_password
    $db['default']['database'] = $cleardb_db

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    

?>