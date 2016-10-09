<?php

    // DB connection
    include_once 'database.php';

    $conn =  mysql_connect($server, $username, $password) or die("Couldn't connect to MySQL" . mysql_error());
    mysql_select_db($database, $conn) or die ("Couldn't open $test: " . mysql_error());

    $userid  = $_POST["userid"];
    $post   = $_POST["post"];
    
    //$tweet = "this has a #hashtag a  #badhash-tag and a #goodhash_tag";
    preg_match_all("/(#\w+)/", $post, $matches);
    var_dump( $matches );

    mysql_query("INSERT INTO posts
    (
        userid,
        content
    )
    VALUES
    (
        '" . $userid . "',
        '" . $post . "'
    )");  

    mysql_close($conn);

 ?>