<?php
namespace lmpscm\db;
include_once('../dbconfig.php');

function connectionToDbHost($host,$user,$password){
    $connection = mysql_connect($host, $user, $password)
                    or die("Kan niet verbinden: " . mysql_error());
    return $connection;
}

function connectionToLocalhost(){
    return connectionToDbHost("localhost", LOCALHOSTUSER, LOCALHOSTPASSWORD);
}

function select_database($database,$hostConnection){
    return mysql_select_db($database,$hostConnection);
}

