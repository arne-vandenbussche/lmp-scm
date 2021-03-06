<?php
namespace lmpscm\db;
use lmpscm\domain;
require_once('../dbconfig.php');
require_once './domain/Persoon.php';
require_once 'dbConnect.php';
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
        $this->dbConnection = connectionToDatabase();  
    }
    
    /*
     * closes database connection if it is still open
     */
    function closeDbConnection() {
        $this->dbConnection->close();
    }
    
    function getPersons(){
        $sql = "SELECT * FROM personen";
        $resultaat = $this->dbConnection->query($sql);
        $personen = [];
        $i=0;
        while ($rij = $resultaat->fetch_assoc()) {
              $persoon = new domain\Persoon($rij["id"], $rij['naam'], 1);
              $persoon ->setVoornaam($rij['voornaam']);
              $persoon ->setAdres($rij['adres']);
              $persoon ->setGemeente($rij['gemeente']);
              $persoon ->setPostnummer($rij['postnummer']);
              $persoon ->setLand($rij['land']);
              $persoon ->setTelefoon($rij['telefoon']);
              $persoon ->setEmail1($rij['email1']);
              $persoon ->setEmail2($rij['email2']);
              $persoon ->setJaarAfzwaai($rij['jaarAfzwaai']);
              $personen[$i] = $persoon;
              $i++;
        }
        return $personen;
    }

    function insertPerson($persoon) {
        // to do: andere waarden invullen
        $sql = "INSERT into personen (naam, voornaam, adres, ,postnummer, "
                . "gemeente, email1, email2, telefoon, jaarafzwaai, opmerkingen, valid) VALUES ('"
                    .$persoon->getNaam()."','"
                    .$persoon->getVoornaam()."','"
                    .$persoon->getAdres()."','"
                    .$persoon->getPostnummer()."','"
                    .$persoon->getGemeente()."','"
                    .$persoon->getEmail1()."','"
                    .$persoon->getEmail2()."','"
                    .$persoon->getTelefoon()."','"
                    .$persoon->getJaarAfzwaai()."','"
                    .$persoon->getOpmerkingen()."','"
                    .$persoon->getValid().
                "')";
        if(!$this->dbConnection->query($sql)){
            echo "De insertquery $sql heeft niet kunnen plaatsvinden. Foutmelding: " . $this->dbConnection->error;
        }
    }
}
