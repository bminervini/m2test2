<?php

namespace Vendor\Gestion;

    require_once(__DIR__ ."/../DAO/DAO.php");  
    use \DAO\DAO;

    require_once(__DIR__."/../Models/Personne.php");
    use \Vendor\Models\Personne;

    class Registration{
        
        private $dao;

        public function __construct(){
            $this->dao = new \Vendor\DAO\DAO();
        }

        /**
         * Register a new user form the data passed in param. Only if the username is not used
         * @return string return error message if the registration fails
         */
        public function registration($nom, $prenom, $username, $password, $mail, $gmail, $admin){

            //__construct($nom, $prenom, $username, $password, $mail, $gmail, $admin, $statutParticipation, $accepte)
            $edu = "@edu.univ-fcomte.fr";
            $google = "@gmail.com";

            /* Set some variables */
            $isOK = true;            
            $mail = $mail.$edu;
            $gmail = $gmail.$google;
    
            //-- Mail Edu Verif --//
            if(!$this->mailNotUsed($mail)){
                $isOK = false;
                return 2;
            }

            //-- Gmail Verif --//
            if(!$this->gmailNotUsed($gmail)){
                $isOk = false;
                return 4;
            }

            if(!Registration::mailIsCorrect($mail)){
                $isOK = false;
                return 3;
            }

            if (!Registration::gmailIsCorrect($gmail)) {
                $isOK = false;
                return 5;
            }
            
            // Username Verif
            if(!$this->usernameNotUsed($username)){
                $isOK = false;
                return 1;
            }

            //-- Finished result --//
            if($isOK){
                
                $password = md5($password);
                $person = new Personne($nom, $prenom, $username, $password, $mail, $gmail, $admin, 0, 0);
                $this->dao->addPersonne($person,"personne");
                
                return 0;
            }
        }

        /**
         * Used to check if the mail edu adress is correct
         * @return boolean return true if the adress is correct
         */
        public static function mailIsCorrect($mail){
            if(preg_match('/^[a-z]{1,15}\.{1}[a-z]{1,15}(@edu\.univ-fcomte\.fr)$/',$mail) != 1){
                return false;
            }else{
                return true;
            }
        }

        /**
         * Used to check if the gmail adress is correct
         * @return boolean return true if the adress is correct
         */
        public static function gmailIsCorrect($gmail){
            if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
                return false;
            }else{
                return true;
            }
        }

        /**
         * Search if the user name passed as paramter is already used
         * @return boolean retrun true if the user name is not used
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

        /**
         * Search if the mail passed as paramter is already used
         * @return boolean return true if the mail is not used
         */
        function mailNotUsed($mail){
            $req = $this->dao->getPersonByMailEdu($mail);
            $result = $req->fetch();

            if($result){
                return false;
            }else{
                return true;
            }
        }

        /**
         * Search if the gmail passed as paramter is already used
         * @return boolean return true if the mail is not used
         */
        function gmailNotUsed($gmail){
            $req = $this->dao->getPersonByGmail($gmail);
            $result = $req->fetch();

            if($result){
                return false;
            }else{
                return true;
            }            
        }

        function errorMsg($res){
            switch ($res) {
                case 0:
                    $error = "User successfully registered !";
                    $_POST = array();
                    break;
                case 1:
                    $error = "Username already used ! ";
                    break;
                case 2:
                    $error = "Mail edu already used !";
                    break;
                case 3:
                    $error = "Mail edu invalid !";
                    break;
                case 4:
                    $error = "Gmail already used !";
                    break;
                case 5:
                    $error = "Gmail invalid !";
                    break;
            }

            return $error;
        }
    }

?>