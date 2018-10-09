<?php

namespace Auth {

    use \DAO\DAO as DAO;

    class Auth{
        
        private $dao;

        public function __consturct(){
            $this->dao = new DAO();
        }

        public function connection($usern, $pass){

            $username = \mysqli_real_escape_string($usern);
            $password = \mysqli_real_escape_string($pass);
            
            if(!empty($username) && !empty($password)){
                
                $cryptedPassword = password_hash($password,PASSWORD_BCRYPT);

                $query = "SELECT * FROM Personne WHERE nom='$username' AND password='$cryptedPassword' LIMIT 1";
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

        static function isLogged(){
            if(isset($_SESSION['username']) and isset($_SESSION['pass'])){
                //Later retrieve the user from the database to perform a verification
                return true;
            }
            return false;
        }
    }
}

?>