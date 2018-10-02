<?php

class Personne{

    var $nom;
    var $prenom;
    var $nombreCroissantAmene;

    function __construct($nom, $prenom){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->nombreCroissantAmene = 0;
        $this->id = md5(date() + $nom + $prenom);
    }

    public function getName()
    {
        return $this->nom;
    }

    public function getFirstName()
    {
        return $this->prenom;
    }
    public function getCroissantAmount()
    {
        return $this->nombreCroissantAmene;
    }
    public function getId()
    {
        return $this->id;
    }

    public function incCroissantAmount($croissants)
    {
        $this->nombreCroissantAmene += $croissants;
    }

}



?>