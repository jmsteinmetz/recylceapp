<?php

    // DB connection
    include_once 'database.php';
    
    $query    = "WHERE active='1' ";

    if(isset($_GET['filters'])) {
        $filters    = $_GET['filters'];
    }
    if(isset($_GET['id'])) {
        $tags       = $_GET['tags'];
    }
    if(isset($_GET['limit'])) {
        $limit       = $_GET['limit'];
    } else {
        $limit       = "1";
    }
    if(isset($_GET['lastid'])) {
        $lastid       = $_GET['lastid'];
        $query        .= " AND id > " . $lastid;
    }
    if(isset($_GET['since'])) {
        $since       = $_GET['since'];
        $query        .= " AND postdate > " . $since;
    }
     if(isset($_GET['offerings'])) {
        $query        .= " AND offering = '1'";
    }
    

    $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
    header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

    $conn =  mysql_connect($server, $username, $password) or die("Couldn't connect to MySQL" . mysql_error());
    mysql_select_db($database, $conn) or die ("Couldn't open $test: " . mysql_error());

    $rows = array();

    $result = mysql_query("SELECT *, posts.id AS postid
            FROM posts 
            INNER JOIN users 
            ON posts.userid = users.id 
            " . $query . " 
            ORDER BY postdate DESC LIMIT " . $limit);

    while($p = mysql_fetch_assoc($result)) {
        $rows["posts"][] = $p;
    }



    echo ($callback ? $callback . '(' : '') . json_encode($rows) . ($callback ? ')' : '');

    mysql_close($conn);

 ?>