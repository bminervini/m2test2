<?php

namespace DAO {

    use \PDO;

    class DAO
    {

        private $connexion = null;

        public function __construct()
        {
            $this->requestConnexion();
        }

        public function getConnexion()
        {
            return $this->connexion;
        }

        function requestConnexion()
        {
            $servername = "172.20.128.68";
            //$servername = "localhost";
            $dbname = "m2test2";
            $username = "m2test2";
            $password = "m2test2";

            try {
                $this->connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
                $connexion = null;
            }
        }

        function __destruct()
        {
            $connexion = null;
        }

        function querySQL($sql)
        {
            $query = $this->connexion->prepare($sql);
            return $query->exec($sql);
        }

        function initialisationBD()
        {
            $this->dropTables();
            $this->createTablePersonne();
            $this->createTableCalendrier();
            $this->createTablePassage();
            $this->createTableDisponibilite();
        }

        function getListPersonne()
        {

        }

        function createTablePersonne()
        {
            $sql = "CREATE TABLE IF NOT EXISTS `personne`(
               `idPersonne` int(11) NOT NULL PRIMARY KEY,
               `nom` varchar(40) NOT NULL,
               `prenom` varchar(40) NOT NULL, 
               `motDePasse` varchar(40) NOT NULL, 
               `isAdmin` int(1) NOT NULL, 
               `participe` int(1) NOT NULL, 
               `nbreCroissantAmene` int(10) NOT NULL
               )";
            $create = $this->connexion->prepare($sql);
            if ($create->execute()) {
                echo " Table personne créé \n";
            } else {
                print_r($create->errorInfo());
            }
        }

        function createTableCalendrier()
        {
            $sql = "CREATE TABLE IF NOT EXISTS `calendrier`(
               `idCalendrier` int(11) NOT NULL PRIMARY KEY,
               `jour` date NOT NULL,
               `ferie` int(1) NOT NULL
               );";
            $create = $this->connexion->prepare($sql);
            if ($create->execute()) {
                echo " Table calendrier créé \n";
            } else {
                print_r($create->errorInfo());
            }
        }

        function createTablePassage()
        {
            $sql = "CREATE TABLE IF NOT EXISTS `passage`(
               `idPassage` int(11) NOT NULL PRIMARY KEY,
               `datePassage` date NOT NULL,
               `statut` int(1) NOT NULL,
               `idPersonne` int NOT NULL,
               FOREIGN KEY (idPersonne) REFERENCES personne(idPersonne)
               );";
            $create = $this->connexion->prepare($sql);
            if ($create->execute()) {
                echo " Table passage créé \n";
            } else {
                print_r($create->errorInfo());
            }
        }

        function createTableDisponibilite()
        {
            $sql = "CREATE TABLE IF NOT EXISTS `disponibilite`(
               `disponible` int (1) NOT NULL,
               `idPersonne` int NOT NULL,
               `idCalendrier` int NOT NULL,
               FOREIGN KEY (idPersonne) REFERENCES personne(idPersonne),
               FOREIGN KEY (idCalendrier) REFERENCES calendrier(idCalendrier), 
               CONSTRAINT PK_Person PRIMARY KEY (idPersonne,idCalendrier));";
            $create = $this->connexion->prepare($sql);
            if ($create->execute()) {
                echo " Table calendrier créé \n";
            } else {
                print_r($create->errorInfo());
            }
        }

        function dropTables()
        {
            $sql = $this->connexion->prepare("
                DROP TABLE IF EXISTS `disponibilite`;
                DROP TABLE IF EXISTS `calendrier`;
                DROP TABLE IF EXISTS `personne`;
                DROP TABLE IF EXISTS `passage`;
                ");
            if ($sql->execute()){
                echo " Tables supprimées ";
            }else{
                print_r($sql->errorInfo());
            };
        }
    }
}
?>