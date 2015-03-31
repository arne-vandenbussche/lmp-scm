<?php
namespace lmpscm\db;
include_once('../dbconfig.php');

function connectionToDatabase(){
    $connection = new \mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
    if ($connection->connect_errno) {
        echo "Failed to connect to MySQL: " . $connection->connect_error;
    }
        
    return $connection;
}