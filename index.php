<?php
namespace lmpscm;    
use lmpscm\db;
include_once './db/dbConnect.php';

$connectionToLocalhost = db\connectionToLocalhost();
$database = db\select_database(DBLMPSCM, $connectionToLocalhost);

include_once 'includes/header.php';
$post = filter_input(INPUT_POST, "toevoegen");
if ($post) {
    $naam = filter_input(INPUT_POST, "naam");
    $voornaam = filter_input(INPUT_POST, "voornaam");
    $email1 = filter_input(INPUT_POST, "email1");

    $sql = "INSERT into personen (naam, voornaam, email1) VALUES ('"
            . $naam . "','" . $voornaam . "','" . $email1 . "')";
    if (!mysql_query($sql)) {
        echo "De insertquery $sql heeft niet kunnen plaatsvinden. Foutmelding: " . mysql_error();
    }
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
</br>        
<table border="1">
        
<?php
    $sql = "SELECT * FROM personen";
    $resultaat = mysql_query($sql);
    while ($rij = mysql_fetch_array($resultaat)) {
?>
        
    <tr><td><?php echo $rij["id"] . " "; ?></td>
            <td><?php echo $rij["naam"] . " "; ?></td>
            <td><?php echo $rij["voornaam"] . " "; ?></td>
            <td><?php echo $rij["email1"]; ?></td>
            <td><input type="submit" class="linkButton" value="verwijder"/></td>
        </tr>                
          
            <?php
        }
        ?>
        </table>
    </body>
</html>
<?php
 $mysql_close = mysql_close($connectionToLocalhost);
 if (!$mysql_close) {
     echo "Het sluiten van de database is niet gelukt: " . mysql_error(); 
 }
 include_once 'includes/footer.php';
