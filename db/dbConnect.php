<?php
namespace lmpscm\db;
include_once('../dbconfig.php');

function connectionToDatabase(){
    $connection = new \mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    /*$connection = mysql_connect($host, $user, $password)
                    or die("Kan niet verbinden: " . mysql_error()); */
    return $connection;
}