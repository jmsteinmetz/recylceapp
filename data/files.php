<?php

    // DB connection
    include_once 'database.php';

    if(isset($_GET['postid'])) {
        $postid    = $_GET['postid'];
    }
    

    $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
    header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

    $conn =  mysql_connect($server, $username, $password) or die("Couldn't connect to MySQL" . mysql_error());
    mysql_select_db($database, $conn) or die ("Couldn't open $test: " . mysql_error());

    $rows = array();

    $result = mysql_query("SELECT *
            FROM files 
            WHERE postid = " . $postid . "
            AND active = '1'");

    $num_results = mysql_num_rows($result); 
 
    if ($num_results > 0){ 
        while($p = mysql_fetch_assoc($result)) {
            $rows["files"][] = $p;
        }
    } else {
        $rows["files"][] = new stdClass();
    }

    echo ($callback ? $callback . '(' : '') . json_encode($rows) . ($callback ? ')' : '');

    mysql_close($conn);

 ?>