<?php

namespace Vendor\DAO\tests\units
{
    use \atoum;
    use \Vendor\Models;

    class DAO extends atoum
    {
        //permet de vérifier que l'on peut accéder à la base de données
        public function testRequestConnexion()
        {
            $dao = new \Vendor\DAO\DAO();
            $this
                ->then->object($dao->getConnexion())->isNotEqualTo(null);
        }

        /*
         * Désactiver car un peu dérangeant de supprimer toutes les données
        //permet de vérifier que toutes les tables sont bien supprimées
        public function testDropTables()
        {
            $dao = new \Vendor\DAO\DAO();
            $dao->dropTables();
            $nbreTable = $dao->getNombreTable();
            $this
                ->integer($nbreTable)
                    ->isEqualTo(0);
        }*/

        //permet d'initialiser la base de données
        public function testCreationTables(){
            //initialiser bdd test
            $dao = $this->initialiserBDDTest();

            $nbreTable = $dao->getNombreTable();
            $nbrePersonne = $dao->getNombrePersonne("personneTest");

            $this
                ->integer($nbreTable)->isEqualTo(6)
                ->and()
                ->integer($nbrePersonne)->isEqualTo(1)
            ;

            //drop bdd test
            $dao->dropTables(true);

        }

        //permet de vérifier que toutes les tables sont bien supprimées
        public function testDropTables()
        {
            $dao = new \Vendor\DAO\DAO();
            $dao->dropTables(true);
            //$requete = $dao->querySQL("SELECT count(table_name) FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = 'm2test2';");
            $nbreTable = $dao->getNombreTable();
            $this
                ->integer($nbreTable)
                ->isNotEqualTo(0);

        }

        //vérifier le fonctionnement de la fonction addPersonne
        public function testAddPersonne(){

            //initialiser bdd test
            $dao = $this->initialiserBDDTest();

            $personne = new \Mock\Vendor\Models\Personne("Merandat", "Jonathan", "John", "test", "john@gmail.com", "john@gmail.com", 1, 1, 1);
            /*$this->calling($personne)->getNom = "Merandat" ;
            $this->calling($personne)->getPrenom = "Jonathan" ;
            $this->calling($personne)->getUsername = "John" ;
            $this->calling($personne)->getPassword = "test" ;
            $this->calling($personne)->getMail = "john@gmail.com" ;*/

            $dao->addPersonne($personne, "personneTest");

            $nbrePersonneDansBdd = $dao->getNombrePersonne("personneTest");

            $this->integer($nbrePersonneDansBdd)->isEqualTo(2);

            //drop bdd test
            $dao->dropTables(true);

        }


        //vérifier que l'on récupère bien la personne désirée
        public function testGetPersonne(){
            //initialiser bdd test
            $dao = $this->initialiserBDDTest();

            $admin = $dao->getPersonne(0, "personneTest");

            $this
                ->string($admin[0][3])->isEqualTo("admin")
                ->string($admin[0][5])->isEqualTo("admin@gmail.com")
            ;

            //drop bdd test
            $dao->dropTables(true);
        }

        //vérifier que l'on peut récupérer une liste de personnes
        public function testGetPersonnes(){

            //initialiser bdd test
            $dao = $this->initialiserBDDTest();

            $gener = new Models\GenerateurPersonne(10);
            $personneRandom = $gener->getPersonnes();

            for ($i = 0; $i < count($personneRandom); $i++){
                $dao->addPersonne($personneRandom[$i], "personneTest");
            }

            $nbrePersonneDansBdd = $dao->getNombrePersonne("personneTest");
            $this->integer($nbrePersonneDansBdd)->isEqualTo(11);

            //drop bdd test
            $dao->dropTables(true);
        }

        //vérifier qu'un utilisateur avec un username déjà existant ne peut pas être ajouté
        public function testUserExistant(){

            //initialiser bdd test
            $dao = $this->initialiserBDDTest();

            $this
                ->exception(
                    function() use($dao){
                        $dao->addAdmin("personneTest");
                    }
                )
            ;

            $nbrePersonne = $dao->getNombrePersonne("personneTest");
            $this
                ->integer($nbrePersonne)
                ->isEqualTo(1);

            //drop bdd test
            $dao->dropTables(true);
        }


        //vérifier le fonctionnement de la fonction updatePersonne
        public function testUpdatePersonne(){

            //initialiser bdd test
            $dao = $this->initialiserBDDTest();

            //mise à jour des infos de l'utilisateur admin
            $personne = new \Mock\Vendor\Models\Personne("NewNomAdmin", "NewPrenomAdmin", "admin", "admin", "newAdmin@gmail.com", "newAdmin@gmail.com", 1, 1, 1);
            $this->calling($personne)->getIdPersonne = 1 ;
            $this->calling($personne)->getNom = "NewNomAdmin" ;
            $this->calling($personne)->getPrenom = "NewPrenomAdmin" ;
            $this->calling($personne)->getUsername = "admin" ;
            $this->calling($personne)->getPassword = "admin" ;
            $this->calling($personne)->getMail = "newAdmin@gmail.com" ;

            $dao->updatePersonne($personne, "personneTest");
            $personne = $dao->getPersonne(0, "personneTest");

            $this->string($personne[0][1])->isEqualTo("NewNomAdmin");
            $this->string($personne[0][2])->isEqualTo("NewPrenomAdmin");
            $this->string($personne[0][4])->isEqualTo("newAdmin@gmail.com");

            //drop bdd test
            $dao->dropTables(true);

        }

        function initialiserBDDTest(){

            $dao = new \Vendor\DAO\DAO();
            $dao->dropTables(true);
            $dao->createTablePersonne("personneTest");
            $dao->createTableCalendrier("calendrierTest");
            $dao->createTableDisponibilite("disponibiliteTest");

            $personne = new \Mock\Vendor\Models\Personne("Administrateur", "Admin", "admin", md5("admin"), "admin@mail.com", "admin@gmail.com", 0, 0, 0 );
            $dao->addPersonne($personne, "personneTest");

            return $dao;
        }

    }
}