<?php

namespace DAO\tests\units
{
    use \atoum;

    class DAO extends atoum
    {
        //permet de vérifier que l'on peut accéder à la base de données
        public function testRequestConnexion()
        {
            $dao = new \DAO\DAO();
            $this
                ->then->object($dao->getConnexion())->isNotEqualTo(null);
        }


        //permet de vérifier que toutes les tables sont bien supprimées
        public function testDropTables()
        {
            $dao = new \DAO\DAO();
            $dao->dropTables();
            $nbreTable = $dao->getNombreTable();
            $this
                ->integer($nbreTable)
                    ->isEqualTo(0);

        }

        //permet d'initialiser la base de données
        public function testInitialisationBD(){
            $dao = new \DAO\DAO();
            $dao->initialisationBD(0);

            $nbreTable = $dao->getNombreTable();
            $nbrePersonne = $dao->getNombrePersonne();

            $this
                ->integer($nbreTable)->isEqualTo(3)
                ->and()
                ->integer($nbrePersonne)->isEqualTo(1)
                ;
        }



        //vérifier le fonctionnement de la fonction addPersonne
        public function testAddPersonne(){

            $dao = new \DAO\DAO();
            $dao->initialisationBD(0);

            $personne = new \Mock\Vendor\Models\Personne();
            $this->calling($personne)->getNom = "Merandat" ;
            $this->calling($personne)->getPrenom = "Jonathan" ;
            $this->calling($personne)->getUsername = "John" ;
            $this->calling($personne)->getPassword = "test" ;
            $this->calling($personne)->getMail = "john@gmail.com" ;

            $dao->addPersonne($personne);

            $nbrePersonneDansBdd = $dao->getNombrePersonne();

            $this->integer($nbrePersonneDansBdd)->isEqualTo(2);
        }


        //vérifier qu'un utilisateur avec un username déjà existant ne peut pas être ajouté
        public function testGetPersonne(){
            $dao = new \DAO\DAO();
            $dao->initialisationBD(0);
            $admin = $dao->getPersonne(0);
            $this
                ->object($admin)->isNotEqualTo(null);
        }

        //vérifier qu'un utilisateur avec un username déjà existant ne peut pas être ajouté
        public function testUserExistant(){
            $dao = new \DAO\DAO();
            $dao->initialisationBD(0);
            $this
                ->exception(
                    function() use($dao){
                        $dao->addAdmin();
                    }
                )
            ;

            $nbrePersonne = $dao->getNombrePersonne();
            $this
                ->integer($nbrePersonne)
                ->isEqualTo(1);

        }


        //vérifier le fonctionnement de la fonction updatePersonne
        public function testUpdatePersonne(){

            //initialisation de la bdd avec un admin dedans
            $dao = new \DAO\DAO();
            $dao->initialisationBD(0);

            //mise à jour des infos de l'utilisateur admin
            $personne = new \Mock\Vendor\Models\Personne();
            $this->calling($personne)->getIdPersonne = 0 ;
            $this->calling($personne)->getNom = "NewNomAdmin" ;
            $this->calling($personne)->getPrenom = "NewPrenomAdmin" ;
            $this->calling($personne)->getUsername = "admin" ;
            $this->calling($personne)->getPassword = "admin" ;
            $this->calling($personne)->getMail = "newAdmin@gmail.com" ;

            $dao->updatePersonne($personne);
            $personne = $dao->getListPersonne(0);

            $this->string($dao)->isEqualTo(2);

        }


    }



}
