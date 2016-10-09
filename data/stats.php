<?php

    // DB connection
    include_once 'database.php';

    $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
    header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

    $conn =  mysql_connect($server, $username, $password) or die("Couldn't connect to MySQL" . mysql_error());
    mysql_select_db($database, $conn) or die ("Couldn't open $test: " . mysql_error());

    $rows = array();

    if(isset($_GET['userid'])) {
        $userid    = $_GET['userid'];
        $token    = $_GET['token'];

        $result = mysql_query("SELECT userid, COUNT(id) AS postcount FROM yo.posts WHERE userid = '" . $userid . "' AND active='1'");

        while($p = mysql_fetch_assoc($result)) {
            if ($p['userid'] === NULL ) {
                $rows["error"] = "User ID not found";
            } else {
                $rows["stats"][] = $p;
            }
            
        }

    } else {
        $result = mysql_query("SELECT COUNT(id) AS postcount FROM yo.posts WHERE active='1'");

        while($p = mysql_fetch_assoc($result)) {
            $rows["stats"][] = $p;
        }
    }
    

    echo ($callback ? $callback . '(' : '') . json_encode($rows) . ($callback ? ')' : '');

    mysql_close($conn);

 ?>