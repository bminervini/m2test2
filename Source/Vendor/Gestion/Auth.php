<?php

namespace Auth;
    include("Source/Vendor/DAO/DAO.php");    
    use \DAO\DAO;

    class Auth{
        
        private $dao;

        public function __construct(){
            $this->dao = new DAO();
        }

        public function connection($usern, $pass){

            //$username = $dao->connexion->quote($usern);
            //$password = $dao->connexion->quote($pass);
            
            if(!empty($username) && !empty($password)){
                
                $cryptedPassword = password_hash($password,PASSWORD_BCRYPT);

                $query = "SELECT * FROM Personne WHERE username='$username' AND password='$cryptedPassword' LIMIT 1";
                $req = $dao->connexion->prepare($query);
                //$req->execute(array("username"=>$username));
                $result = $req->fetch();
                
                if(!$result){
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['pass'] = $password;

                    header("Location: dashboard.php");
                }else{
                    $error = "Your Login Name or Password is invalid";
                }
            }
        }

        public static function isLogged(){
            if(isset($_SESSION['username']) and isset($_SESSION['pass'])){
                //Later retrieve the user from the database to perform a verification
                return true;
            }
            return false;
        }
    }


?>