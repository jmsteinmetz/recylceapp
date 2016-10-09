<?php

    // DB connection
    include_once 'database.php';

    if(isset($_GET['userid'])) {
        $userid    = $_GET['userid'];
        $query     = "WHERE users.id = " . $userid;
    } else {
        $query     = "";
    }

    $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
    header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

    $conn =  mysql_connect($server, $username, $password) or die("Couldn't connect to MySQL" . mysql_error());
    mysql_select_db($database, $conn) or die ("Couldn't open $test: " . mysql_error());

    $rows = array();

     $result = mysql_query("SELECT users.id as userid, users.firstname, users.lastname, users.handle, users.profileimg, users.mainimg, users.companyid, 
            companies.name AS companyname, companies.img AS companyimg
            FROM users 
            INNER JOIN companies 
            ON companies.id=users.companyid 
            " . $query);

    while($p = mysql_fetch_assoc($result)) {
        $rows["user"][] = $p;
    }

    echo ($callback ? $callback . '(' : '') . json_encode($rows) . ($callback ? ')' : '');

    mysql_close($conn);

 ?>