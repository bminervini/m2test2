<?php

namespace Vendor\Gestion\test\units 
{   
    use \atoum;

    class Auth extends atoum {
        
        public function testCreateSession(){
            
            $this
                ->given(\Vendor\Gestion\Auth::createSession("admin","admin",1))
                ->string($_SESSION["username"])->isEqualTo("admin")
                ->and
                ->string($_SESSION["password"])->isEqualTo("admin")
                ->and
                ->integer($_SESSION["isAdmin"])->isEqualTo(1);
        }

        public function testIsLogged(){
        
            $this
                ->given(\Vendor\Gestion\Auth::createSession("admin","admin",1))
                ->variable(\Vendor\Gestion\Auth::isLogged())->isEqualTo(true);
        }

        public function testLogout(){
            $this
                ->given(\Vendor\Gestion\Auth::createSession("admin","admin",1)) 
                ->if(\Vendor\Gestion\Auth::logout())
                ->then
                ->variable(\Vendor\Gestion\Auth::isLogged())->isEqualTo(false);
        }
    }
}