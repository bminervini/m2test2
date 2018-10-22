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
            $dao = $this->initialiserBDDTest(10);

            $nbreTable = $dao->getNombreTable();
            $nbrePersonne = $dao->getNombrePersonne("personneTest");

            $this
                ->integer($nbreTable)->isEqualTo(6)
                ->and()
                ->integer($nbrePersonne)->isEqualTo(11)
                ->executeOnFailure(
                    function () use ($dao) {
                        var_dump($dao);
                    })
            ;

            //drop bdd test
            $dao->dropTables(true);

        }

        //permet de vérifier que toutes les tables sont bien supprimées
        /*public function testDropTables()
        {
            $dao = new \Vendor\DAO\DAO();
            $dao->dropTables(true);
            $nbreTable = $dao->getNombreTable();
            $this
                ->integer($nbreTable)
                ->isNotEqualTo(0);

        }*/

        //vérifier le fonctionnement de la fonction addPersonne
        public function testAddPersonne(){
            //initialiser bdd test
            $dao = $this->initialiserBDDTest(10);

            $personne = new \Mock\Vendor\Models\Personne("Merandat", "Jonathan", "John", "test", "john@gmail.com", "john@gmail.com", 1, 1, 1);
            /*$this->calling($personne)->getNom = "Merandat" ;
            $this->calling($personne)->getPrenom = "Jonathan" ;
            $this->calling($personne)->getUsername = "John" ;
            $this->calling($personne)->getPassword = "test" ;
            $this->calling($personne)->getMail = "john@gmail.com" ;*/

            $dao->addPersonne($personne, "personneTest");

            $nbrePersonneDansBdd = $dao->getNombrePersonne("personneTest");

            $this->integer($nbrePersonneDansBdd)->isEqualTo(12);

            //drop bdd test
            $dao->dropTables(true);
        }


        //vérifier que l'on récupère bien la personne désirée
        public function testGetPersonne(){
            //initialiser bdd test
            $dao = $this->initialiserBDDTest(10);

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
            $dao = $this->initialiserBDDTest(10);

            $nbrePersonneDansBdd = $dao->getNombrePersonne("personneTest");
            $this->integer($nbrePersonneDansBdd)->isEqualTo(11);

            //drop bdd test
            $dao->dropTables(true);
        }

        //vérifier qu'un utilisateur avec un username déjà existant ne peut pas être ajouté
        public function testUserExistant(){
            //initialiser bdd test
            $dao = $this->initialiserBDDTest(10);

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
                ->isEqualTo(11);

            //drop bdd test
            $dao->dropTables(true);
        }


        //vérifier le fonctionnement de la fonction updatePersonne
        public function testUpdatePersonne(){
            //initialiser bdd test
            $dao = $this->initialiserBDDTest(10);

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

        function initialiserBDDTest($nombreDePersonne){
            $dao = new \Vendor\DAO\DAO();
            $dao->dropTables(true);
            $dao->createTablePersonne("personneTest");
            $dao->createTableCalendrier("calendrierTest");
            $dao->createTableDisponibilite("disponibiliteTest");

            $personne = new \Mock\Vendor\Models\Personne("Administrateur", "Admin", "admin", md5("admin"), "admin@mail.com", "admin@gmail.com", 0, 0, 0 );
            $dao->addPersonne($personne, "personneTest");

            if ($nombreDePersonne > 0){
                $generator = new \Vendor\Models\GenerateurPersonne($nombreDePersonne);
                $personnes = $generator->getPersonnes();
                for ($i = 0; $i < count($personnes); $i++){
                    $dao->addPersonne($personnes[$i], "personneTest");
                }
            }

            return $dao;
        }

        function getListParticipant(){
            //initialiser bdd test
            $dao = $this->initialiserBDDTest(10);

            $participant = $dao->getListParticipant("personneTest");

            //on vérifie que toutes les personnes participent
            $test = true;
            for ($i = 0; $i < count($participant); $i++){
                if ($participant[$i][5] = 0) $test = false;
            }

            $this->boolean($test)->isEqualTo(true);

            //drop bdd test
            $dao->dropTables(true);
        }

    }
}