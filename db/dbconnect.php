<?php


    $servername = "127.0.0.1";
    $username = "okidailthief";
    $password = "";
    $database = "band_manager";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    //echo "Connected successfully (".$sql->host_info.")";
    ?>