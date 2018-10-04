<?php

namespace Registration;
    require_once("../DAO/DAO.php");    
    use \DAO\DAO;
    //include("../Models/Personne.php");
    //use \Models\Personne;

    class Registration{
        
        private $dao;

        public function __construct(){
            $this->dao = new DAO();
        }

        public function registered($nom, $prenom, $username, $password, $mail, $admin){
        
            echo "nom : ".$nom."| prenom : ".$prenom."| username : ".$username."| password : ".$password."| mail : ".$mail."| admin : ".$admin;
            //$person = new Personne($nom, $prenom, $username, $password, $mail, $admin);
        }

        private function isAlreadyUse($username){
            //$query = "SELECT * FROM personne WHERE username='$username' AND password='$cryptedPassword'LIMIT 1";
        }
    }

?>