<?php
namespace lmpscm\domain;

/**
 * Een persoon uit de lijst
 *
 * @author arnevandenbussche
 */
class Persoon implements \JsonSerializable{
    
    private $id;
    private $naam;
    private $voornaam;
    private $adres;
    private $postnummer;
    private $gemeente;
    private $land;
    private $email1;
    private $email2;
    private $telefoon;
    private $jaarAfzwaai;
    private $opmerkingen;
    private $valid;
    
    function __construct($id, $naam, $valid) {
        $this->id = $id;
        $this->naam = $naam;
        $this->valid = $valid;
    }
    
    public function jsonSerialize() {
        return [
            'id' => $this->getId(),
            'naam' => $this->getNaam(),
            'voornaam' => $this->getVoornaam(),
            'adres' => $this->getAdres(),
            'postnummer' => $this->getPostnummer(),
            'gemeente' => $this->getGemeente(),
            'land' => $this->getLand(),
            'email1' => $this->getEmail1(),
            'email2' => $this->getEmail2(),
            'telefoon' => $this->getTelefoon(),
            'jaarAfwaai' => $this->getJaarAfzwaai(),
            'opmerkingen' => $this->getOpmerkingen(),
            'valid' => $this->getValid()
        ];
    }
    function getId() {
        return $this->id;
    }

    function getNaam() {
        return $this->naam;
    }

    function getVoornaam() {
        return $this->voornaam;
    }

    function getAdres() {
        return $this->adres;
    }

    function getPostnummer() {
        return $this->postnummer;
    }

    function getGemeente() {
        return $this->gemeente;
    }

    function getLand() {
        return $this->land;
    }

    function getEmail1() {
        return $this->email1;
    }

    function getEmail2() {
        return $this->email2;
    }

    function getTelefoon() {
        return $this->telefoon;
    }

    function getJaarAfzwaai() {
        return $this->jaarAfzwaai;
    }

    function getOpmerkingen() {
        return $this->opmerkingen;
    }

    function getValid() {
        return $this->valid;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNaam($naam) {
        $this->naam = $naam;
    }

    function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;
    }

    function setAdres($adres) {
        $this->adres = $adres;
    }

    function setPostnummer($postnummer) {
        $this->postnummer = $postnummer;
    }

    function setGemeente($gemeente) {
        $this->gemeente = $gemeente;
    }

    function setLand($land) {
        $this->land = $land;
    }

    function setEmail1($email1) {
        $this->email1 = $email1;
    }

    function setEmail2($email2) {
        $this->email2 = $email2;
    }

    function setTelefoon($telefoon) {
        $this->telefoon = $telefoon;
    }

    function setJaarAfzwaai($jaarAfzwaai) {
        $this->jaarAfzwaai = $jaarAfzwaai;
    }

    function setOpmerkingen($opmerkingen) {
        $this->opmerkingen = $opmerkingen;
    }

    function setValid($valid) {
        $this->valid = $valid;
    }

}
