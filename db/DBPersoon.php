<?php
namespace lmpscm\db;
use lmpscm\domain;
require_once('../dbconfig.php');
require_once './domain/Persoon.php';

/**
 * Klasse om persoonobjecten in de database bij te werken
 * De connectie naar de database wordt geopend en de database wordt
 * geselecteerd.
 * Het is belangrijk dat de client zelf de connectie weer sluit met de
 * methode closeDbConnection()
 *
 * @author arnevandenbussche
 */
class DBPersoon {
    
    private $dbConnection = \NULL;
    
    /*
     * Opent databaseconnectie en selecteert correcte database
     */
    function __construct() {
        try {
            $this->dbConnection = new \mysqli(DBSERVER, DBUSER, DBPASSWORD, DATABASE);
        } catch (Exception $ex) {
            echo('FOUT: '.$e->getMessage());
        }
        
    }
    
    /*
     * closes database connection if it is still open
     */
    function closeDbConnection() {
        $this->dbConnection.close();
    }
    
    function getPersons(){
        $sql = "SELECT * FROM personen";
        $resultaat = mysql_query($sql);
        $personen = [];
        $i=0;
        while ($rij = mysql_fetch_array($resultaat)) {
              $id = $rij["id"];
              $naam = $rij['naam'];
              $voornaam = $rij['voornaam'];
              $email1 = $rij['email1'];
              $persoon = new domain\Persoon($id, $naam, 1);
              $persoon ->setVoornaam($voornaam);
              $persoon ->setEmail1($email1);
              $personen[$i] = $persoon;
              $i++;
        }
        return $personen;
    }

    function insertPerson($persoon) {
        // to do: andere waarden invullen
        $sql = "INSERT into personen (naam, voornaam, email1) VALUES ('"
                    .$persoon->getNaam()."','"
                    .$persoon->getVoornaam()."','"
                    .$persoon->getEmail1()."')";
        if(!mysql_query($sql)){
            echo "De insertquery $sql heeft niet kunnen plaatsvinden. Foutmelding: " . mysql_error();
        }
    }
}
