<?php

namespace Auth;
    require_once("../src/main/Vendor/DAO/DAO.php");

    class Auth{
        
        private $dao;

        public function __construct(){
            $this->dao = new DAO();
        }

        public function connection($username, $password)
        {

            if(!empty($username) && !empty($password)){
                
                $cryptedPassword = md5($password);
                $query = "SELECT * FROM personne WHERE username='$username' AND password='$cryptedPassword'LIMIT 1";
        
                $req = $this->dao->querySQL($query);                
                $result = $req->fetch();
 
                if($result){
                    
                    $this->createSession($username, $cryptedPassword, $result['isAdmin']);
                    header("Location: dashboard.php");
                   
                    echo "Connecté !";
                }else{
                    echo "Mauvais mdp !";
                    $error = "Your Login Name or Password is invalid";
                }
            }
        }

        public static function isLogged(){
            session_start();//> START SESSION 
            if(isset($_SESSION['username']) and isset($_SESSION['password']) and isset($_SESSION['isAdmin'])){
                //Later retrieve the user from the database to perform a verification
                return true;
            }
            return false;
        }

        public static function Logout(){
            if($this->isLogged()){
                unset($_SESSION["username"]);
                unset($_SESSION['password']); 
                unset($_SESSION['isAdmin']); 
            }
        }

        public static function createSession($username, $password, $isAdmin){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['isAdmin'] = $isAdmin
        }
    }

?>