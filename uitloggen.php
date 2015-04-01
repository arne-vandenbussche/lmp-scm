<?php
/* 
 * uitlogpagina
 */
session_start();
unset($_SESSION['userName']);
unset($_SESSION['userFirstName']);
unset($_SESSION['userLastName']);
unset($_SESSION['userEmail']);
unset($_SESSION['userRole']);
header('Location: index.php');
exit;