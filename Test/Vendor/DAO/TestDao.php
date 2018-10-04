<?php

namespace DAO\tests\units
{

    use \atoum;
    use Models\Personne;

    class DAO extends atoum
    {
        //permet de vérifier que l'on peut accéder à la base de données
        public function testRequestConnexion()
        {
            $this
                ->given($dao = new \DAO\DAO())
                ->then->object($dao->getConnexion())->isNotEqualTo(null);
        }

        //permet de vérifier que toutes les tables sont bien supprimées
        public function testDropTables()
        {
            $dao = new \DAO\DAO();
            $dao->dropTables();

            $this
                ->integer($dao->querySQL("SELECT count(table_name) FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = 'm2test2';"))
                    ->isEqualTo(0);

        }

        //vérifier le fonctionnement de la fonction addPersonne
        public function

        //vérifier qu'un utilisateur avec un username déjà existant ne peut pas être ajouté
        public function testUserExistant(){
            $dao = new \DAO\DAO();
            $dao->initialisationBD();
            $personne = new Personne("Merandat", "Jonathan", "john", md5("test"), "jon@mail.com", 0 );
            $dao->addPersonne($personne);

            $this
                ->object($dao->addPersonne($personne))
                    ->isEqualTo(null);

        }


    }



}
