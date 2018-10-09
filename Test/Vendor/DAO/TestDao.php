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
            var_dump($nbreTable);
            $nbrePersonne = $dao->getNombrePersonne();
            var_dump($nbrePersonne);

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
        public function testUserExistant(){
            $dao = new \DAO\DAO();
            $dao->initialisationBD(0);
            $this
                ->exception(
                    function() use($dao){
                        $dao->addAdmin();
                    }
                )
                    ->hasCode(23000)
                    ->hasMessage("Integrity");

            $nbrePersonne = $dao->getNombrePersonne();
            $this
                ->integer($nbrePersonne)
                    ->isEqualTo(1);

        }


    }



}
