<?php

/*
 * Saves and retrieves user
 */

namespace lmpscm\db;
use lmpscm\domain;
include_once 'dbConnect.php';
include_once './domain/User.php';

/**
 * Description of dbUser
 *
 * @author arnevandenbussche
 */
class DbUser {
    
     const DBLMPSCM = "lmp-scm";
    
    private $databaseName = NULL;
    private $dbConnection = \NULL;
    private $database = \NULL;
    
    /*
     * Opent databaseconnectie en selecteert correcte database
     */
    function __construct() {
        try {
            $this->dbConnection = connectionToLocalhost();
            $this->databaseName = self::DBLMPSCM;
            $this->database = select_database($this->databaseName, $this->dbConnection);
        } catch (Exception $ex) {
            echo('FOUT: '.$e->getMessage());
        }
        
    }
    
    /*
     * closes database connection if it is still open
     */
    function closeDbConnection() {
        if($this->dbConnection <> NULL && is_resource($this->dbConnection) 
                && get_resource_type($this->dbConnection) === 'mysql link')
        {
            return mysql_close($this->dbConnection);
        }
        else
        {
            echo "Seems to be closed already";
            return false;
        }
    }
    
    function getUsers(){
        $sql = "SELECT * FROM lmpUsers";
        $resultaat = mysql_query($sql);
        $users = [];
        $i=0;
        while ($rij = mysql_fetch_array($resultaat)) {
              $id = $rij["id"];
              $firstName = $rij['firstName'];
              $lastName = $rij['lastName'];
              $userName = $rij['userName'];
              $email = $rij['email'];
              $password = $rij['password'];
              $role = $rij['role'];
              $user = new domain\User($id, $firstName, $lastName, $userName, $email, $password, $role);
              $users[$i] = $user;
              $i++;
        }
        return $users;
    }

    function insertUser($user) {
        // to do: andere waarden invullen
        $sql = "INSERT into lmpUsers (firstName, lastName, userName, email, password) VALUES ('"
                    .$user->getFirstname()."','"
                    .$user->getLastName()."','"
                    .$user->getUserName()."','"
                    .$user->getEmail()."','"
                    .$user->getPasswordHash()."')";
        if(!mysql_query($sql)){
            echo "De insertquery $sql heeft niet kunnen plaatsvinden. Foutmelding: " . mysql_error();
        }
    }
    
    function getUser($aUserName){
        $sql = "SELECT id, lastName, firstName, userName, email, password, role FROM lmpUsers "
                . "WHERE userName = '".$aUserName."'";
        $result = mysql_query($sql);
        $rij = mysql_fetch_row($result);
        if (!$result) {
            echo 'Could not run query: ' . mysql_error();
             exit;
        }
        $id = $rij[0];
        $lastName = $rij[1];
        $firstName = $rij[2];
        $userName = $rij[3];
        $email = $rij[4];
        $password = $rij[5];
        $role = $rij[6];
        $user = new domain\User($id, $firstName, $lastName, $userName, $email, $password, $role);
        return $user;
    }
}
