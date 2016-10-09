<?php
    
    // DB connection
    include_once 'database.php';

    $conn =  mysql_connect($server, $username, $password) or die("Couldn't connect to MySQL" . mysql_error());
    mysql_select_db($database, $conn) or die ("Couldn't open $test: " . mysql_error());

    $postid  = $_POST["postid"];
    $boxid   = $_POST["boxid"];

    mysql_query("UPDATE files SET postid = " . $postid . ", active='1' WHERE boxid = '" . $boxid . "'");  

    mysql_close($conn);

 ?>