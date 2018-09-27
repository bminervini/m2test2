<?php

class Personne{

    var $nom;
    var $prenom;
    var $nombreCroissantAmene;

    function __construct($nom, $prenom){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->nombreCroissantAmene = 0;
    }

    function getName()
    {
        return $this->nom;
    }

    public function getFirstName()
    {
        return $this->prenom;
    }
    function getCroissantAmount()
    {
        return $this->nombreCroissantAmene;
    }



}



?>