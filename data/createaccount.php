<?php
    
    // DB connection
    include_once 'database.php';

    $conn =  mysql_connect($server, $username, $password) or die("Couldn't connect to MySQL" . mysql_error());
    mysql_select_db($database, $conn) or die ("Couldn't open $test: " . mysql_error());

    $firstname  = $_POST["firstname"];
    $lastname   = $_POST["lastname"];
    $email      = $_POST["email"];
    $handle     = $_POST["handle"];
    $userkey   = $_POST["userkey"];
    $profileimg = $_POST["profileimg"];
    $companyid  = $_POST["companyid"];

    mysql_query("INSERT INTO users
    (
        firstname,
        lastname,
        email,
        handle,
        profileimg,
        companyid,
        userkey
    )
    VALUES
    (
        '" . $firstname . "',
        '" . $lastname . "',
        '" . $email . "',
        '" . $handle . "',
        '" . $profileimg . "',
        '" . $companyid . "',
        '" . md5($userkey) . "'
    )");  

    mysql_close($conn);

 ?>