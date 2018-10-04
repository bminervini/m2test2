<?php

namespace DAO\tests\units
{

    use \atoum;

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
                ->integer($dao->querySQL("SELECT Count(*) FROM INFORMATION_SCHEMA.Tables"))
                    ->isEqualTo(0);

        }


    }



}
