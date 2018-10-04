<?php

namespace Auth;
    require_once("../DAO/DAO.php");    
    use \DAO\DAO;

    class Auth{
        
        private $dao;

        public function __construct(){
            $this->dao = new DAO();
        }

        public function connection($username, $password){

            if(!empty($username) && !empty($password)){
                
                $cryptedPassword = md5($password);
                $query = "SELECT * FROM personne WHERE username='$username' AND password='$cryptedPassword'LIMIT 1";
        
                $req = $this->dao->querySQL($query);
                
                $result = $req->fetch();
 
                if($result){
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $cryptedPassword;

                   header("Location: dashboard.php");
                   
                   echo "Connecté !";
                }else{
                    echo "Mauvais mdp !";
                    $error = "Your Login Name or Password is invalid";
                }
            }
        }

        public static function isLogged(){
            if(isset($_SESSION['username']) and isset($_SESSION['password'])){
                //Later retrieve the user from the database to perform a verification
                return true;
            }
            return false;
        }
    }


?>