<?php
    session_start();
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'job_portal';

    // Create connection
    $con = new mysqli($host, $user, $pass, $db);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }   
?>