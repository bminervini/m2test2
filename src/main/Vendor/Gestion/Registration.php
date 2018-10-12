<?php


namespace Vendor\Gestion;
    require_once( __DIR__ . "/../DAO/DAO.php"); // use for Atoum
    //require_once("../src/main/Vendor/DAO/DAO.php");   
    use \DAO\DAO;
    require_once(__DIR__ . "/../Models/Personne.php");// use for Atoum
    //require_once("../src/main/Vendor/Models/Personne.php");
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

                return true;
            
            }else{

                return false;
            }
        }

        /**
         * Search if the user name passed as paramter is already used
         * @return boolean retrun ture is the user name is not used
         */
        function usernameNotUsed($username){
            
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