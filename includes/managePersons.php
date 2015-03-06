<?php
use lmpscm\db;
use lmpscm\domain;
include_once './db/dbPersoon.php';
include_once './domain/Persoon.php';


$dbPersoon = new db\DBPersoon();
$personen = $dbPersoon->getPersons();
/*$post = filter_input(INPUT_POST, "toevoegen");
if ($post) {
    $naam = filter_input(INPUT_POST, "naam");
    $voornaam = filter_input(INPUT_POST, "voornaam");
    $email1 = filter_input(INPUT_POST, "email1");
    $persoon = new domain\Persoon(0, $naam, 1);
    $persoon->setVoornaam($voornaam);
    $persoon->setEmail1($email1);
    $dbPersoon->insertPerson($persoon);
} */
?>
<script type="text/javascript">
    var personen = JSON.parse( '<?php echo json_encode($personen); ?>' );
 </script>
<!--
<div>  formulier om elementen toe te voegen    
        <form method="post" action="<?php //echo $_SERVER["PHP_SELF"] ?>">
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
</div>  einde van het formulier -->

<div class="row"> <!-- rij met tabel van personen links en rechts detail -->
    <div class="col-md-6"> <!-- linkerkolom met de tabel -->
<!-- tabel met personen -->
    <table id="tblPersonen" class="display">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Voornaam</th>
        </tr>
        </thead>
        <tbody>   
        </tbody>
    </table> <!-- einde van de tabel met personen -->
    </div> <!-- einde van de linkerkolom met de tabel -->
    
    <div class="col-md-6"> <!-- rechterkolom met de detailgegevens -->
        <p>Detailgegevens</p>
        <div id="persoonDetail">
            
        </div>
        <form>
            <input type="text" id="familienaam" name="familienaam">
        </form>
    </div> <!-- einde van detailgegevens -->
</div> <!-- einde van de rij met de tabel van personen links en detail rechts -->
<?php

 $dbPersoon->closeDbConnection();
 unset($dbPersoon);

