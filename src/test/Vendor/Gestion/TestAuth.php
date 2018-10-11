<?php

namespace Vendor\Gestion\test\units 
{   
    use \atoum;

    class Auth extends atoum {
        
        public function testCreateSession(){
            
            \Vendor\Gestion\Auth::createSession("admin","admin",1);

            $this
                ->string($_SESSION["username"])->isEqualTo("admin");

        }

        public function testIsLogged(){
            
        }

    }
}