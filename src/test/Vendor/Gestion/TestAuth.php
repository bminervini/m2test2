<?php

namespace Vendor\Gestion\test\units 
{   
    use \atoum;

    class Auth extends atoum {
        
        function testCreateSession(){
            
            $this
                ->given(\Vendor\Gestion\Auth::createSession("admin",1))
                ->string($_SESSION["username"])->isEqualTo("admin")
                ->and
                ->integer($_SESSION["isAdmin"])->isEqualTo(1);
        }

        function testIsLogged(){
        
            $this
                ->given(\Vendor\Gestion\Auth::createSession("admin",1))
                ->variable(\Vendor\Gestion\Auth::isLogged())->isEqualTo(true);
        }

        function testLogout(){
            $this
                ->given(\Vendor\Gestion\Auth::createSession("admin",1)) 
                ->if(\Vendor\Gestion\Auth::logout())
                ->then
                ->variable(\Vendor\Gestion\Auth::isLogged())->isEqualTo(false);
        }

        function testConnectionOK(){
            $auth = new \Vendor\Gestion\Auth();
            $this
                ->given($auth->connection("admin","admin"))
                ->variable(\Vendor\Gestion\Auth::isLogged())->isEqualTo(true);
        }

        function testConectionKO(){
            $auth = new \Vendor\Gestion\Auth();
            $this
                ->given($auth->connection("admin","wrong"))
                ->variable(\Vendor\Gestion\Auth::isLogged())->isEqualTo(false);
        }

        function testConnectionInjection(){
            $auth = new \Vendor\Gestion\Auth();
            $this
                ->given($auth->connection("'OR 1=1#","wrong"))
                ->variable(\Vendor\Gestion\Auth::isLogged())->isEqualTo(false);
        }
    }
}