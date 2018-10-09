<?php

namespace Auth\tests\units 
{
    use \atoum;

    class Auth extends atoum {
        
        public function testCreateSession(){
            
            \Auth\Auth::createSession("admin","admin",1);

            $this
                ->($_SESSION["username"])->isEqualTo("admin");

        }

        public function testIsLogged(){
            
        }

    }
}