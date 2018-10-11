<?php

namespace Registration;
    require_once("../src/main/Vendor/DAO/DAO.php");
    //use \DAO\DAO;
    //include("../Models/Personne.php");
    //use \Models\Personne;

    class Registration{
        
        private $dao;

        public function __construct(){
            $this->dao = new \Vendor\DAO\DAO();
        }

        public function registered($nom, $prenom, $username, $password, $mail, $admin){
        
            echo "nom : ".$nom."| prenom : ".$prenom."| username : ".$username."| password : ".$password."| mail : ".$mail."| admin : ".$admin;
            
            if($this->isNotUse($username)){
                echo "pas utilisé";
            }else{
                echo "déjà utilisé";
            }
            
            /*
            $person = new Personne($nom, $prenom, $username, $password, $mail, $admin);
            $this->dao->addPersonne($person);
            */
        }

        private function isNotUse($username){
            $query = "SELECT * FROM personne WHERE username='$username'";
            
            $req = $this->dao->querySQL($query);    
            $result = $req->fetch();

            if($result){
                return false;
            }else{
                return true;
            }
        }
    }

?>