<?php

    $host = 'localhost'; 
    $user = 'root'; //username
    $pass = 'your_db_password'; //your database password
    $db_name = 'blog';

    $conn = new mysqli($host, $user, $pass, $db_name);

    if($conn->connect_error) {
        die('Database connection error: ' . $conn->connect_error);
    }
