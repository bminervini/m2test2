<?php


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

        /**
         *  Used to connect a user form the password and username passed in param 
         * @return string return error message if the connection fails
         */
        public function connection($username, $password)
        {

            if(!empty($username) && !empty($password)){
                
                $req = $this->dao->getPersonToAuth($username, $password);
                $result = $req->fetch();
 
                if($result){
                    /* create session and redirects the user to the dashboard */
                    $this->createSession($username, $result['isAdmin']);
                    header("Location: dashboard.php");
                
                }else{
                    /* return error message */
                    return "Invalid username or password !";
                }
            }
        }

        /**
         * Used to know if a user is connected 
         * @return boolean return true is the user is logged else false
         */
        public static function isLogged(){
            if(isset($_SESSION['username']) and isset($_SESSION['isAdmin'])){
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