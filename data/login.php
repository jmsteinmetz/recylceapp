<?php

    // DB connection
    include_once 'database.php';

    $user    = $_POST['email'];
    $pass    = $_POST['userkey'];

    $md5password = md5($pass);
    $GUID = getGUID();
    $GUID = substr($GUID, 1, -1);

    //echo $password;

    $callback = isset($_GET['callback']) ? preg_replace('/[^a-z0-9$_]/si', '', $_GET['callback']) : false;
    header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');

    $conn =  mysql_connect($server, $username, $password) or die("Couldn't connect to MySQL" . mysql_error());
    mysql_select_db($database, $conn) or die ("Couldn't open $test: " . mysql_error());

    $rows = array();

    $update = mysql_query("UPDATE users SET accesstoken ='" . $GUID . "' WHERE email='" . $user . "'");
    $rows["token"] = $GUID;

    $result = mysql_query("SELECT users.id as userid, users.firstname, users.lastname,  users.email, users.handle, users.profileimg, users.companyid, 
            companies.name AS companyname, companies.img AS companyimg
            FROM users 
            INNER JOIN companies 
            ON companies.id=users.companyid WHERE users.email = '" . $user . "' AND users.userkey = '" . $md5password . "'");

    while($p = mysql_fetch_assoc($result)) {
        $rows["user"][] = $p;
    }

    echo ($callback ? $callback . '(' : '') . json_encode($rows) . ($callback ? ')' : '');

    mysql_close($conn);

    function getGUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
    }

 ?>