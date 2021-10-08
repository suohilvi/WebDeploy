<?php 

    // Enable us to use Headers
    ob_start();

    // Set sessions
    if(!isset($_SESSION)) {
        session_start();
    }
    
    include('D:/home/site/login.php');
    
    $connection = new mysqli($hostname, $username, $password, $dbname) or die("Database connection not established.".$connection->connect_error)
?>