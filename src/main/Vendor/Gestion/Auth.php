<?php
// back
namespace Vendor\Gestion;
    
    require_once(__DIR__ . "/../DAO/DAO.php");

    //require_once("../../htdocs/m2test2/src/main/Vendor/DAO/DAO.php"); // use for Atoum
    use \DAO\DAO;

    class Auth{

        private $dao;

        public function __construct()
        {
            $this->dao = new \Vendor\DAO\DAO();
        }


        public function connection($username, $password)
        {

            //UPDATE `m2test2`.`personne` SET `password` = '21232f297a57a5a743894a0e4a801fc3' WHERE `personne`.`idPersonne` = 1;      
            //INSERT INTO `m2test2`.`personne` (`idPersonne`, `nom`, `prenom`, `username`, `mail`, `password`, `isAdmin`, `participe`, `nbreCroissantAmene`) VALUES ('1', 'thierry ', 'margoulin', 'admin', 'thierry@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', '0', '0');     
            if(!empty($username) && !empty($password)){
                
                $cryptedPassword = md5($password);
                $query = "SELECT * FROM personne WHERE username='$username' AND password='$cryptedPassword'LIMIT 1";
                
                $req = $this->dao->getConnexion()->prepare($query);
                $req->execute();
                
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

        /**
         * Used to know if a user is connected 
         * @return boolean return true is the user is logged else false
         */

        public static function isLogged(){
            if(isset($_SESSION['username']) and isset($_SESSION['password'])){
                //Later retrieve the user from the database to perform a verification
                return true;
            }
            return false;
        }

        /**
         *  Used to disconnect a user by removing session variables 
         * @return boolean return true if the disconnection was successful
         */
        public static function logout(){
            if(Auth::isLogged()){
                unset($_SESSION["username"]);
                unset($_SESSION['isAdmin']); 

                return true;
            }
        }

        /**
         *  Used to create the user's session variables
         */
        public static function createSession($username, $isAdmin){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['isAdmin'] = $isAdmin;
        }

        //TODO
        private function userStillInDB(){

        }
    }


?>