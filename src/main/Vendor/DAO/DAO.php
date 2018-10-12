<?php

namespace Vendor\DAO {

    use \PDO;

    use \Vendor\Models;

    require_once(__DIR__ . "/../Models/Personne.php");
    require_once(__DIR__ . "/../Models/GenerateurPersonne.php");

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
            try {
                $requete = $this->connexion->prepare($sql);
                $requete->execute();
                return $requete;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return null;
            }
        }

        function getNombreTable(){
            $sql = "SELECT count(table_name) FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = 'm2test2';";
            $cursor = $this->connexion->prepare($sql);
            $cursor->execute();
            $nbre = $cursor->fetchAll();
            $cursor->closeCursor();
            return intval($nbre[0][0]);
        }

        function getNombrePersonne($nomTable){
            $sql = "SELECT count(*) FROM $nomTable;";
            $cursor = $this->connexion->prepare($sql);
            $cursor->execute();
            $nbre = $cursor->fetchAll();
            $cursor->closeCursor();
            return intval($nbre[0][0]);
        }

        //initialise la bdd (schéma) avec un admin
        function initialisationBD($nombreDePersonne)
        {
            $this->dropTables(false);
            $this->createTablePersonne("personne");
            $this->createTableCalendrier("calendrier");
            $this->createTableDisponibilite("disponibilite");

            $this->addAdmin("personne");

            if ($nombreDePersonne > 0){
                $generator = new \Vendor\Models\GenerateurPersonne($nombreDePersonne);
                $personnes = $generator->getPersonnes();
                for ($i = 0; $i < count($personnes); $i++){
                    $this->addPersonne($personnes[$i], "personne");
                }
            }

        }

        function addAdmin($nomTable)
        {
            $mdp = md5("admin");
            $sql = "INSERT INTO `m2test2`.`$nomTable` (`idPersonne`, `nom`, `prenom`, `username`, `password`, `mail`,  `isAdmin`, `participe`, `nbreCroissantAmene`)
                    VALUES (NULL, 'Administrateur', 'admin', 'admin', '$mdp', 'admin@gmail.com', '1', '1', '0');";
            try {
                $this->connexion->exec($sql);
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        //ajoute une personne dans la base de données
        //si l'ajout est possible, retourne la personne avec l'idPersonne renseigné
        //sinon retourne null
        function addPersonne($personne, $nomTable)
        {
            $nom = $personne->getNom();
            $prenom = $personne->getPrenom();
            $username = $personne->getUsername();
            $password = $personne->getPassword();
            $mail = $personne->getMail();
            $gmail = $personne->getGmail();
            $admin = $personne->isADmin();
            $statutParticipation = $personne->getStatutParticipation();
            $accepte = $personne->getAccepte();
            $nbreCroissant = 0;

            $sql = "INSERT INTO `m2test2`.`$nomTable` (`idPersonne`, `nom`, `prenom`, `username`, `password`, `mail`, `gmail`, `isAdmin`, `nbreCroissantAmene`, `statutParticipation`, `accepte`)
                    VALUES (NULL, :lastname, :firstname, :username, :password, :mail, :gmail, :isAdmin, :nbreCroissant, :statutParticipation, :accepte);";
            try {
                
                $req = $this->connexion->prepare($sql);

                $req->bindParam(':lastname', $nom);
                $req->bindParam(':firstname', $prenom);
                $req->bindParam(':username', $username);
                $req->bindParam(':password', $password);
                $req->bindParam(':mail', $mail);
                $req->bindParam(':gmail', $gmail);
                $req->bindParam(':isAdmin', $admin);
                $req->bindParam(':statutParticipation', $statutParticipation);
                $req->bindParam(':accepte', $accepte);
                $req->bindParam(':nbreCroissant', $nbreCroissant);

                $idPersonne = $req->execute();

                if ($idPersonne == null){
                    return null;
                }else{
                    $personne->setIdPersonne($idPersonne);
                    return $personne;
                }
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
                return null;
            }
        }

        function getListPersonne($nomTable)
        {
            $sql = "SELECT * FROM $nomTable;";
            $cursor = $this->connexion->prepare($sql);
            $cursor->execute();
            $nbre = $cursor->fetchAll();
            $cursor->closeCursor();
            return $nbre;
        }

        function updatePersonne($personne, $nomTable){

            $idPersonne = $personne->getIdPersonne();
            $nom = $personne->getNom();
            $prenom = $personne->getPrenom();
            $username = $personne->getUsername();
            $password = $personne->getPassword();
            $mail = $personne->getMail();
            $gmail = $personne->getGmail();
            $admin = $personne->isADmin();
            $statutParticipation = $personne->getStatutParticipation();
            $accepte = $personne->getAccepte();
            $nbreCroissant = $personne->getNombreCroissantAmene();

            $sql = "UPDATE $nomTable
                    SET   `nom` = :lastname, 
                          `prenom` = :firstname,
                          `username` = :username,
                          `mail` = :mail,
                          `gmail` = :gmail,
                          `password` = :password,
                          `isAdmin` = :isAdmin,
                          `statutParticipation` = :statutParticipation,
                          `nbreCroissantAmene` = :nbreCroissant
                    WHERE `idPersonne` = '$idPersonne';";

            $req = $this->connexion->prepare($sql);

            $req->bindParam(':lastname', $nom);
            $req->bindParam(':firstname', $prenom);
            $req->bindParam(':username', $username);
            $req->bindParam(':password', $password);
            $req->bindParam(':mail', $mail);
            $req->bindParam(':gmail', $gmail);
            $req->bindParam(':isAdmin', $admin);
            $req->bindParam(':statutParticipation', $statutParticipation);
            $req->bindParam(':accepte', $accepte);
            $req->bindParam(':nbreCroissant', $nbreCroissant);

            try {
                if($req->execute()){
                    return true;
                }else{
                    return false;
                };
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
                return null;
            }
        }

        function deletePersonne($idPersonne, $nomTable){
            $sql = "DELETE FROM table_name
                    WHERE `idPersonne` = :idPersonne;";
            $req = $this->connexion->prepare($sql);
            $req->bindParam(':idPersonne', $idPersonne);
            try {
                if($req->exec($sql)){
                    return true;
                }else{
                    return false;
                };
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
                return null;
            }
        }

        function getPersonne($id, $nomTable){
            $sql = "SELECT * FROM $nomTable WHERE 'personne.id' = $id;";
            $cursor = $this->connexion->prepare($sql);
            $cursor->execute();
            $personne = $cursor->fetchAll();
            $cursor->closeCursor();
            return $personne;
        }

        /**
         * Used to retrieve a person from their username and password
         * @return request return the PDO object of the request
         */
        function getPersonToAuth($username, $password){
            $password = md5($password);
            $req = $this->connexion->prepare("SELECT * FROM personne WHERE username= ? AND password= ? LIMIT 1");
            $req->execute(array($username, $password));
            
            return $req;
        }

        /**
         * Used to retrieve a person from their username
         * @return request return the PDO object of the request
         */
        function getPersonByUsername($username){
            $req = $this->connexion->prepare("SELECT * FROM personne WHERE username= ?");
            $req->execute(array($username));

            return $req;
        }

        ////////////////////////////
        //Création du schéma de BDD
        ////////////////////////////

        function createTablePersonne($nomTable)
        {
            $sql = "CREATE TABLE IF NOT EXISTS `$nomTable`(
               `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
               `nom` varchar(40) NOT NULL,
               `prenom` varchar(40) NOT NULL, 
               `username` varchar(40) NOT NULL UNIQUE, 
               `mail` varchar(40) NOT NULL UNIQUE, 
               `gmail` varchar(40) NOT NULL UNIQUE, 
               `password` varchar(40) NOT NULL, 
               `isAdmin` int(1) NOT NULL, 
               `accepte` int(1) NOT NULL, 
               `statutParticipation` int(1) NOT NULL, 
               `nbreCroissantAmene` int(10) NOT NULL,
               PRIMARY KEY (idPersonne)
               )";
            $create = $this->connexion->prepare($sql);

            if ($create->execute()) {
                //echo " Table personne créé \n";
                return true;
            } else {
                //print_r($create->errorInfo());
                return false;
            }
        }

        function createTableCalendrier($nomTable)
        {
            $sql = "CREATE TABLE IF NOT EXISTS `$nomTable`(
               `idCalendrier` int(11) NOT NULL AUTO_INCREMENT,
               `jour` date NOT NULL,
               PRIMARY KEY (idCalendrier)
               );";
            $create = $this->connexion->prepare($sql);
            if ($create->execute()) {
                //echo " Table calendrier créé \n";
                return true;
            } else {
                //print_r($create->errorInfo());
                return false;
            }
        }

        function createTableDisponibilite($nomTable)
        {
            $sql = "CREATE TABLE IF NOT EXISTS `$nomTable`(
               `idPersonne` int NOT NULL,
               `idCalendrier` int NOT NULL,
               `disponible` int (1) NOT NULL,
               `amenCroissant` int(1) NOT NULL, 
               FOREIGN KEY (idPersonne) REFERENCES personne(idPersonne),
               FOREIGN KEY (idCalendrier) REFERENCES calendrier(idCalendrier), 
               CONSTRAINT PK_Person PRIMARY KEY (idPersonne,idCalendrier))
               ;";
            $create = $this->connexion->prepare($sql);
            if ($create->execute()) {
                //echo " Table calendrier créé \n";
            } else {
               //print_r($create->errorInfo());
            }
        }

        function dropTables($test)
        {
            if ($test){
                $sql = $this->connexion->prepare("
                DROP TABLE IF EXISTS `disponibiliteTest`;
                DROP TABLE IF EXISTS `calendrierTest`;
                DROP TABLE IF EXISTS `personneTest`;
                ");
                if ($sql->execute()) {
                    //echo " Tables supprimées ";
                } else {
                    //print_r($sql->errorInfo());
                };
            }else{
                $sql = $this->connexion->prepare("
                DROP TABLE IF EXISTS `disponibilite`;
                DROP TABLE IF EXISTS `calendrier`;
                DROP TABLE IF EXISTS `personne`;
                ");
                if ($sql->execute()) {
                    //echo " Tables supprimées ";
                } else {
                    //print_r($sql->errorInfo());
                };
            }

        }
    }

}
?>