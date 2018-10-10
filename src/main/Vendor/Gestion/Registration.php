<?php

namespace Vendor\Gestion;
    require_once("../src/main/Vendor/DAO/DAO.php");   
    use \DAO\DAO;

    require_once("../src/main/Vendor/Models/Personne.php");
    use \Vendor\Models\Personne;

    class Registration{
        
        private $dao;

        public function __construct(){
            $this->dao = new \Vendor\DAO\DAO();
        }

        /**
         * Registers a new user form the data passed in param. Only if the username is not used
         * @return string return error message if the registration fails
         */
        public function registration($nom, $prenom, $username, $password, $mail, $admin){
           
            if($this->usernameNotUsed($username)){
                
                $password = md5($password);
                $person = new Personne($nom, $prenom, $username, $password, $mail, $admin);
                $this->dao->addPersonne($person,"personne");
            
            }else{

                return "Username already used !";
            }
        }

        /**
         * Search if the user name passed as paramter is already used
         * @return boolean retrun ture is the user name is not used
         */
        private function usernameNotUsed($username){
            
            $req = $this->dao->getPersonByUsername($username);
            $result = $req->fetch();

            if($result){
                return false;
            }else{
                return true;
            }
        }
    }

?>