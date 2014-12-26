<?php
namespace lmpscm;    
use lmpscm\db;
use lmpscm\domain;
include_once './db/dbPersoon.php';
include_once './domain/Persoon.php';


$dbPersoon = new db\DBPersoon();

include_once 'includes/header.php';
           

 
$post = filter_input(INPUT_POST, "toevoegen");
if ($post) {
    $naam = filter_input(INPUT_POST, "naam");
    $voornaam = filter_input(INPUT_POST, "voornaam");
    $email1 = filter_input(INPUT_POST, "email1");
    $persoon = new domain\Persoon(0, $naam, 1);
    $persoon->setVoornaam($voornaam);
    $persoon->setEmail1($email1);
    $dbPersoon->insertPerson($persoon);
}
?>
<div> <!-- formulier om elementen toe te voegen -->    
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <table border="0">
                <tr>
                    <td><label for="naam">Naam: *</label></td>
                    <td><input type="text" name="naam" id="naam" required></td>
                </tr>
                <tr>
                    <td><label for="voornaam">Voornaam: *</label></td>
                    <td><input type="text" name="voornaam" id="voornaam" required></td>
                </tr>
                <tr>
                    <td><label for="email1">E-mailadres 1:</label></td>
                    <td><input type="email" name="email1" id="email1"></td>
                </tr>
            </table>
            <input type="submit" name="toevoegen" value="Voeg persoon toe">
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
        </tr>
        </thead>
        <tbody>
        
        <?php
          $personen = $dbPersoon->getPersons();
          foreach($personen as $persoon){
        ?>
        
            <tr><td><?php echo $persoon->getId(); ?></td>
                <td><?php echo $persoon->getNaam(); ?></td>
                <td><?php echo $persoon->getVoornaam(); ?></td>
            </tr>                
          
            <?php
        }
        ?>
            
        </tbody>
    </table> <!-- einde van de tabel met personen -->

<?php

 $dbPersoon->closeDbConnection();
 unset($dbPersoon);
 include_once 'includes/footer.php';

