<?php

namespace DAO {

    use \PDO;
    include("../Models/Personne.php");
    use \Models\Personne;

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
                $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                echo $e->getMessage();
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
            return $query->exec();
        }

        //initialise la bdd avec un admin
        function initialisationBD()
        {
            $this->dropTables();
            $this->createTablePersonne();
            $this->createTableCalendrier();
            $this->createTableDisponibilite();

            $this->addAdmin();

        }

        function addAdmin()
        {
            $pers = new Personne("Administrateur", "admin", "admin", md5("admin"), "admin@gmail.com", 1);
            $this->addPersonne($pers);
        }

        function addPersonne($personne)
        {
            $nom = $personne->getNom();
            $prenom = $personne->getPrenom();
            $username = $personne->getUsername();
            $password = $personne->getPassword();
            $mail = $personne->getMail();
            $admin = $personne->isADmin();
            $participe = $personne->getParticipe();
            $nbreCroissant = $personne->getNombreCroissantAmene();

            $sql = "INSERT INTO `m2test2`.`personne` (`idPersonne`, `nom`, `prenom`, `username`, `password`, `mail`,  `isAdmin`, `participe`, `nbreCroissantAmene`)
                    VALUES (NULL, '$nom', '$prenom', '$username', '$password', '$mail', '$admin', '$participe', '$nbreCroissant');";
            try {
                $this->connexion->exec($sql);
                var_dump("Admin ajouté");
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        function getListPersonne()
        {

        }


        //Création du schéma de BDD
        function createTablePersonne()
        {
            $sql = "CREATE TABLE IF NOT EXISTS `personne`(
               `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
               `nom` varchar(40) NOT NULL,
               `prenom` varchar(40) NOT NULL, 
               `username` varchar(40) NOT NULL, 
               `mail` varchar(40) NOT NULL, 
               `password` varchar(40) NOT NULL, 
               `isAdmin` int(1) NOT NULL, 
               `participe` int(1) NOT NULL, 
               `nbreCroissantAmene` int(10) NOT NULL,
               PRIMARY KEY (idPersonne)
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
               `idCalendrier` int(11) NOT NULL AUTO_INCREMENT,
               `jour` date NOT NULL,
               `ferie` int(1) NOT NULL, 
               PRIMARY KEY (idCalendrier)
               );";
            $create = $this->connexion->prepare($sql);
            if ($create->execute()) {
                echo " Table calendrier créé \n";
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
               `ferie` int(1) NOT NULL, 
               FOREIGN KEY (idPersonne) REFERENCES personne(idPersonne),
               FOREIGN KEY (idCalendrier) REFERENCES calendrier(idCalendrier), 
               CONSTRAINT PK_Person PRIMARY KEY (idPersonne,idCalendrier))
               ;";
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
                ");
            if ($sql->execute()) {
                echo " Tables supprimées ";
            } else {
                print_r($sql->errorInfo());
            };
        }
    }

}
?>