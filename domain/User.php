<?php

/*
 * This class represents a user.
 */

namespace lmpscm\domain;

/**
 * Description of User
 *
 * @author arnevandenbussche
 */
class User {
    
    private $id;
    private $lastName;
    private $firstName;
    private $userName;
    private $email;
    private $passwordHash;
    private $role;
    
    function __construct($id, $lastName, $firstName, $userName, $email, $passwordHash, $role) {
        $this->id = $id;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->userName = $userName;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->role = $role;
    }
    
    function getRole() {
        return $this->role;
    }

    function setRole($role) {
        $this->role = $role;
    }

        function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

        function getId() {
        return $this->id;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getUserName() {
        return $this->userName;
    }

    function getPasswordHash() {
        return $this->passwordHash;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPasswordHash($passwordHash) {
        $this->passwordHash = $passwordHash;
    }



}
