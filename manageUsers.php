<?php
namespace lmpscm;    
use lmpscm\db;
use lmpscm\domain;
include_once './db/dbUser.php';
include_once './domain/User.php';


$dbUser = new db\DbUser();
 
$post = filter_input(INPUT_POST, "toevoegen");
if ($post) {
    $firstName = filter_input(INPUT_POST, "firstName");
    $lastName = filter_input(INPUT_POST, "lastName");
    $userName = filter_input(INPUT_POST, "userName");
    $email = filter_input(INPUT_POST, "email");
    $password = password_hash(filter_input(INPUT_POST, "paswoord"),PASSWORD_BCRYPT);
    $user = new domain\User(0, $firstName, $lastName, $userName, $email, $password, "");
    $dbUser->insertUser($user);
}
?>
<div> <!-- formulier om elementen toe te voegen -->    
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <table border="0">
                <tr>
                    <td><label for="lastName">Naam: *</label></td>
                    <td><input type="text" name="lastName" id="lastName" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="firstName">Voornaam: *</label></td>
                    <td><input type="text" name="firstName" id="firstName" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="userName">Gebruikersnaam:</label></td>
                    <td><input type="text" name="userName" id="userName" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="email">E-mailadres:</label></td>
                    <td><input type="email" name="email" id="email" size="50" required></td>
                </tr>
                <tr>
                    <td><label for="password">Paswoord:</label></td>
                    <td><input type="password" name="paswoord" id="paswoord" size="50" required></td>
                </tr>
            </table>
            <input type="submit" name="toevoegen" value="Voeg gebruiker toe">
        </form>
</div> <!-- einde van het formulier -->
    </br>
 
<!-- tabel met personen -->
    <table id="tblPersonen" class="display">
        <thead>
        <tr>
            <th>Id</th>
            <th>Naam</th>
            <th>Voornaam</th>
            <th>Gebruikersnaam</th>
            <th>E-mailadres</th>
            <th>Paswoord</th>
        </tr>
        </thead>
        <tbody>
        
        <?php
          $users = $dbUser->getUsers();
          foreach($users as $user){
        ?>
        
            <tr><td><?php echo $user->getId(); ?></td>
                <td><?php echo $user->getLastName(); ?></td>
                <td><?php echo $user->getFirstName(); ?></td>
                <td><?php echo $user->getUserName(); ?></td>
                <td><?php echo $user->getEmail(); ?></td>
                 <td><?php echo $user->getPasswordHash(); ?></td>
                 <td><?php echo $user->getRole(); ?></td>
            </tr>                
          
            <?php
        }
        ?>
            
        </tbody>
    </table> <!-- einde van de tabel met personen -->

<?php

 $dbUser->closeDbConnection();
 unset($dbUser);
 include_once 'includes/footer.php';

