<?php

    $host = 'localhost';
    $user = 'root';
    $pass = 'noke5';
    $db_name = 'blog';

    $conn = new mysqli($host, $user, $pass, $db_name);

    if($conn->connect_error) {
        die('Database connection error: ' . $conn->connect_error);
    }
    // else{
    //     echo"Database connected succesfully";
    // }
