<?php
namespace DAO {

    class DAO
    {

        private $connexion = null;

        public function __construct()
        {
            $this->getConnexion();
        }

        function getConnexion()
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

        function queryList($sql)
        {
            return $this->connexion->exec($sql);
        }

        function initialisationBD()
        {
            $this->dropTables();
            $this->createTablePersonne();
        }

        function getListPersonne()
        {

        }

        function createTablePersonne()
        {
            $sql = "CREATE TABLE IF NOT EXISTS `personne`(
               `id` int(11) NOT NULL,
               `nom` varchar(40) NOT NULL,
               `prenom` varchar(40) NOT NULL, 
               `nbreCroissantAmene` int(10) NOT NULL)";
            $create = $this->connexion->prepare($sql);
            if ($create->execute()) {
                echo " Table created ";
            } else {
                print_r($create->errorInfo());
            }
        }

        function dropTables()
        {
            $sql = $this->connexion->prepare("DROP TABLE IF EXISTS `personne`");

            if ($sql->execute()) {
                echo " Table deleted ";
            } else {
                print_r($sql->errorInfo());
            }

        }
    }
}
?>