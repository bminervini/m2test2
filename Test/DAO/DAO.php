<?php

namespace DAO\tests\units {

    use \atoum;

    class DAO extends atoum
    {

        public function testConnexion()
        {
            $dao = new \DAO\DAO();
            $this->$dao->getConnexion()->isNotEqualTo(null);
        }

    }

}