<?php
namespace lmpscm; 
session_start();

include_once './db/dbUser.php';
include_once './domain/User.php';


/**
 * validates the user: does the user exist.
 * @param $user type lmpscm\domain\USER
 * @param $userName type string
 * @param $password type $string
 * @return true if user is correct, else false
 */
function validateUser($user,$userName,$password){
    if (($user->getUserName() == $userName) && 
            (password_verify($password,$user->getPasswordHash()))) {
         return true;
    }          
    return false;
}

$dbUser = new db\DbUser();
 
$userName = filter_input(INPUT_POST, "inputUserName",FILTER_SANITIZE_STRING);
if ($userName) {
    $password = (filter_input(INPUT_POST, "inputPassword"));
    $user = $dbUser->getUser($userName);
    if  (validateUser($user,$userName,$password)) {
        $_SESSION['userName']=$userName;
        $_SESSION['userFirstName']=$user->getFirstName();
        $_SESSION['userLastName']=$user->getLastName();
        $_SESSION['userEmail']=$user->getEmail();
        $_SESSION['userRole']=$user->getRole();
    }
    //TO DO: remember me implementeren
}
   
$dbUser->closeDbConnection();

require_once 'includes/header.php';

if (!isset($_SESSION['userName'])) { //gebruiker niet aangemeld
    require_once './includes/inloggen.php';
}
else { //gebruiker is aangemeld
    require_once './includes/managePersons.php';
}
require_once 'includes/footer.php';

