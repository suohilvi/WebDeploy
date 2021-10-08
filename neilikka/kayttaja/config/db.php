<?php 

    // Enable us to use Headers
    ob_start();

    // Set sessions
    if(!isset($_SESSION)) {
        session_start();
    }
    
    $hostname = "127.0.0.1:51743";
    $username = "azure";
    $password = "6#vWHD_$";
    $dbname = "asiakkaat";
    
    $connection = new mysqli($hostname, $username, $password, $dbname) or die("Database connection not established.".$connection->connect_error)
?>