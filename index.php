<?php
namespace lmpscm;    
use lmpscm\db;
use lmpscm\domain;
include_once './db/dbPersoon.php';
include_once './domain/Persoon.php';

$dbPersoon = new db\DBPersoon();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
    <head>
        <meta charset="UTF-8">
        <title>lmp-scm</title>
        <link rel="stylesheet" type="text/css" href="css/screen.css">
        <style>
            
        </style>
    </head>
    <body>
        <?php
            $post = filter_input(INPUT_POST, "toevoegen");
            if ($post) {
                $naam = filter_input(INPUT_POST, "naam");
                $voornaam = filter_input(INPUT_POST,"voornaam");
                $email1 = filter_input(INPUT_POST,"email1");
                $persoon = new domain\Persoon(0,$naam,1);
                $persoon->setVoornaam($voornaam);
                $persoon->setEmail1($email1);
                $dbPersoon->insertPerson($persoon);
            }
        ?>
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
        <table border="1">
        
        <?php
          $personen = $dbPersoon->getPersons();
          foreach($personen as $persoon){
        ?>
        
            <tr><td><?php echo $persoon->getId(); ?></td>
                <td><?php echo $persoon->getNaam(); ?></td>
                <td><?php echo $persoon->getVoornaam(); ?></td>
                <td><?php echo $persoon->getEmail1(); ?></td>
                <td><input type="submit" class="linkButton" value="verwijder"/></td>
            </tr>                
          
        <?php
            }
        ?>
        </table>
    </body>
</html>
<?php
 $dbPersoon->closeDbConnection();
 unset($dbPersoon);
