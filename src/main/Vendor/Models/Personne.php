<?php


namespace Vendor\Models {

    class Personne
    {
        var $nom;
        var $prenom;
        var $nombreCroissantAmene;
        var $username;
        var $password;
        var $mail;
        var $gmail;
        var $admin;
        var $statutParticipation;
        var $accepte;
        var $idPersonne = null;

        function __construct($nom, $prenom, $username, $password, $mail, $gmail, $admin, $statutParticipation, $accepte)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->username = $username;
            $this->password = $password;
            $this->nombreCroissantAmene = 0;
            $this->mail = $mail;
            $this->gmail = $gmail;
            $this->statutParticipation = $statutParticipation;
            $this->accepte = $accepte;
            $this->admin = $admin;
        }

        public function setIdPersonne($idPersonne)
        {
            $this->idPersonne = $idPersonne;
        }

        public function getIdPersonne()
        {
            return $this->idPersonne;
        }

        public function getAccepte()
        {
            return $this->accepte;
        }

        public function getStatutParticipation()
        {
            return $this->statutParticipation;
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

        public function getGmail()
        {
            return $this->gmail;
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
        public function isDisponible()
        {
            return true;
        }

    }

}


?>