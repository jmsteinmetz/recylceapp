<?php
// DB connection
    // DB connection
    include_once 'database.php';

    $conn =  mysql_connect($server, $username, $password) or die("Couldn't connect to MySQL" . mysql_error());
    mysql_select_db($database, $conn) or die ("Couldn't open $test: " . mysql_error());

    //postid="+postid+"&filename="+name+"&url="+url

    $boxid     = $_POST["boxid"];
    $filename   = $_POST["filename"];
    $url        = $_POST["url"];

    mysql_query("INSERT INTO files
    (
        boxid,
        filename,
        url
    )
    VALUES
    (
        '" . $boxid . "',
        '" . $filename . "',
        '" . $url . "'
    )");  

    mysql_close($conn);

 ?>