<?php

/*
 * Saves and retrieves user
 */

namespace lmpscm\db;

use lmpscm\domain;

require_once('../dbconfig.php');
require_once './domain/User.php';
require_once('dbConnect.php');

/**
 * Description of dbUser
 *
 * @author arnevandenbussche
 */
class DbUser {

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

    function getUsers() {
        $sql = "SELECT * FROM lmpUsers";
        $resultaat = $this->dbConnection->query($sql);
        $users = [];
        $i = 0;
        while ($rij = $resultaat->fetch_assoc()) {
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
                . $user->getFirstname() . "','"
                . $user->getLastName() . "','"
                . $user->getUserName() . "','"
                . $user->getEmail() . "','"
                . $user->getPasswordHash() . "')";
        if (!$this->dbConnection->query($sql)) {
            echo "De insertquery $sql heeft niet kunnen plaatsvinden. Foutmelding: " . $this->dbConnection->error;
        }
    }

    function getUser($aUserName) {
        $sql = "SELECT id, lastName, firstName, userName, email, password, role FROM lmpUsers "
                . "WHERE userName = '" . $aUserName . "'";
        $resultaat = $this->dbConnection->query($sql);
        $rij = $resultaat->fetch_assoc();
        $id = $rij["id"];
        $firstName = $rij['firstName'];
        $lastName = $rij['lastName'];
        $userName = $rij['userName'];
        $email = $rij['email'];
        $password = $rij['password'];
        $role = $rij['role'];
        $user = new domain\User($id, $firstName, $lastName, $userName, $email, $password, $role);
        return $user;
    }

}
