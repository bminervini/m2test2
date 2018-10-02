<?php


namespace Models {

    class Personne
    {
        var $nom;
        var $prenom;
        var $nombreCroissantAmene;
        var $username;
        var $password;
        var $mail;
        var $admin;

        function __construct($nom, $prenom, $username, $password, $mail, $admin)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->username = $username;
            $this->password = $password;
            $this->nombreCroissantAmene = 0;
            $this->mail = $mail;
            $this->admin = $admin;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function getPrenom()
        {
            return $this->prenom;
        }

        public function getUsername()
        {
            return $this->username;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getMail()
        {
            return $this->mail;
        }

        public function isADmin()
        {
            return $this->admin;
        }

        public function getNombreCroissantAmene()
        {
            return $this->nombreCroissantAmene;
        }

        public function getId()
        {
            return $this->id;
        }

        public function incNombreCroissant($croissants)
        {
            $this->nombreCroissantAmene += $croissants;
        }

    }

}


?>