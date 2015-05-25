<?php

use lmpscm\db;
use lmpscm\domain;

include_once './db/dbPersoon.php';
include_once './domain/Persoon.php';


$dbPersoon = new db\DBPersoon();
$personen = $dbPersoon->getPersons();
/* $post = filter_input(INPUT_POST, "toevoegen");
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
    var personen = JSON.parse('<?php echo json_encode($personen); ?>');
</script>
<div class="row" style="padding:10px;" id="buttonNewPerson">
    <button type="button" class="btn btn-primary col-sm-6">Voeg een persoon toe</button>
</div>
<div class="row"> <!-- toevoegen nieuwe gebruiker -->
    <form class="form-horizontal col-sm-6" id="formnewperson">
        <h3>Een persoon toevoegen</h3>
        <div class="form-group">
            <label for="newnaam" class="col-sm-4 control-label">Naam: *</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="newnaam" id="newnaam" required>
            </div>
        </div>
        <div class="form-group">
            <label for="newvoornaam" class="col-sm-4 control-label">Voornaam: *</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="newvoornaam" id="newvoornaam" required>
            </div>
        </div>
        <div class="form-group">
            <label for="newadres" class="col-sm-4 control-label">Adres:</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="newadres" id="newadres">
            </div>
        </div>
        <div class="form-group">
            <label for="newpostnummer" class="col-sm-4 control-label">Postnummer:</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="newpostnummer" id="newpostnummer">
            </div>
        </div>
        <div class="form-group">
            <label for="newgemeente" class="col-sm-4 control-label">Gemeente:</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="newgemeente" id="newgemeente">
            </div>
        </div>
        <div class="form-group">
            <label for="newland" class="col-sm-4 control-label">Land:</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="newland" id="newland">
            </div>
        </div>
        <div class="form-group">
            <label for="newemail1" class="col-sm-4 control-label">E-mailadres 1:</label>
            <div class="col-sm-8">
                <input class="form-control" type="email" name="newemail1" id="newemail1">
            </div>
        </div>
        <div class="form-group">
            <label for="newemail2" class="col-sm-4 control-label">E-mailadres 2:</label>
            <div class="col-sm-8">
                <input class="form-control" type="email" name="newemail2" id="newemail2">
            </div>
        </div>
        <div class="form-group">
            <label for="newtelefoon" class="col-sm-4 control-label">Telefoon:</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" name="newtelefoon" id="newtelefoon">
            </div>
        </div>
        <div class="form-group">
            <label for="newjaarafzwaai" class="col-sm-4 control-label">Jaar afzwaai</label>
            <div class="col-sm-8">
                <input class="form-control" type="number" name="newjaarafzwaai" id="newjaarafzwaai">
            </div>
        </div>
        <div class="form-group">
            <label for="newopmerkingen" class="col-sm-4 control-label">Opmerkingen:</label>
            <div class="col-sm-8">
                <input class="form-control" type="textarea" name="newopmerkingen" id="newopmerkingen">
            </div>
        </div>
        <button type="button" class="btn btn-default" id="newPersonCancel">Annuleren</button>
        <button type="button" class="btn btn-primary" id="newPersonSave">Opslaan</button>

    </form>
</div>

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
        <h3>Detailgegevens</h3>
        <div id="persoonDetail">
            <form class="form-horizontal" id="formeditperson">
                <fieldset id="editpersoon" disabled>
                    <div class="form-group">
                        <label for="neditaam" class="col-sm-4 control-label">Naam: *</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="editnaam" id="editnaam" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editvoornaam" class="col-sm-4 control-label">Voornaam: *</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="editvoornaam" id="editvoornaam" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editadres" class="col-sm-4 control-label">Adres:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="editadres" id="editadres">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editpostnummer" class="col-sm-4 control-label">Postnummer:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="editpostnummer" id="editpostnummer">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editgemeente" class="col-sm-4 control-label">Gemeente:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="editgemeente" id="editgemeente">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editland" class="col-sm-4 control-label">Land:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="editland" id="editland">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editemail1" class="col-sm-4 control-label">E-mailadres 1:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" name="editemail1" id="editemail1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editemail2" class="col-sm-4 control-label">E-mailadres 2:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" name="editemail2" id="editemail2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edittelefoon" class="col-sm-4 control-label">Telefoon:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" name="edittelefoon" id="edittelefoon">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editjaarafzwaai" class="col-sm-4 control-label">Jaar afzwaai</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="number" name="editjaarafzwaai" id="editjaarafzwaai">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editopmerkingen" class="col-sm-4 control-label">Opmerkingen:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="textarea" name="editopmerkingen" id="editopmerkingen">
                        </div>
                    </div>
                </fieldset>
            </form>  
        </div>
    </div> <!-- einde van detailgegevens -->
</div> <!-- einde van de rij met de tabel van personen links en detail rechts -->
<?php
$dbPersoon->closeDbConnection();
unset($dbPersoon);

