<?php
use lmpscm\domain;
use lmpscm\db;
require_once '../db/DBPersoon.php';
/* 
 * This file will save a new person in the database
 */

$familienaam =  $_POST["naam"];
$voornaam =  $_POST["voornaam"];
$persoon = new domain\Persoon(0,$familienaam,1);
$persoon->setVoornaam($voornaam);
$db = new db\DBPersoon();
try {
    $db->insertPerson($persoon);
    $db->closeDbConnection();

}
catch (Exception $e) { 
  echo $e->errorMessage(); 
} 