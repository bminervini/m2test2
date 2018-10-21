<?php

namespace Vendor\Gestion;
    
    require_once(__DIR__ ."/../DAO/DAO.php");

    use \DAO\DAO;

    class Gestion{
        
        private $dao;

        public function __construct()
        {
            $this->dao = new \Vendor\DAO\DAO();
        }

    }

?>