<?php
    // Class d'authentification

    class Auth{
        
        private $dao;

        public function connection($username, $password)
        {
            if(!empty($username) && !empty($password)){
                $cryptedPassword = password_hash($password,PASSWORD_BCRYPT);
                $query = "SELECT * FROM user WHERE username = $usernae AND password = $cryptedPassword";
            }
        }

    }
?>