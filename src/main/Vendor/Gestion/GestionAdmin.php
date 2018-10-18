<?php
// back
namespace Vendor\Gestion;
    
    require_once(__DIR__ ."/../DAO/DAO.php");
    
    use \DAO\DAO;

    class GestionAdmin{
        
        private $dao;

        public function __construct()
        {
            $this->dao = new \Vendor\DAO\DAO();
        }

        function acceptInactiveUser(){
        
        }

        function refuseInactiveUser(){

        }

        function getAllInactiveUser(){
            $req = $this->dao->getActivedOrNotPersons(0);
            $result = $req->fetchAll();
            $req->closeCursor();

            return $result;
        }

        function getAllActiveUser(){

        }

        function deleteActiveUser(){

        }
      
    }

?>