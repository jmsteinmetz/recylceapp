<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    // DB connection
    include_once '../database.php';

    $limit = $_GET["limit"];

    $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
    header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

    $conn = new mysqli($server, $username, $password, $db);
    mysql_select_db($database, $conn) or die ("Couldn't open $test: " . mysql_error());

    $rows = array();

     $result = mysql_query("SELECT *
            FROM a_tblcarts LIMIT $limit" );

    while($p = mysql_fetch_assoc($result)) {
        $rows["carts"][] = $p;
    }

    echo ($callback ? $callback . '(' : '') . json_encode($rows) . ($callback ? ')' : '');

    mysql_close($conn);

 ?>