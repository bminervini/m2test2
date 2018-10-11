<?php

namespace Vendor\Gestion\test\units 
{   
    use \atoum;
    //php applis/atoum/atoum.phar -f src/test/Vendor/Gestion/TestRegistration.php -bf src/test/.bootstrap.atoum.php

    class Registration extends atoum {

        function testRegistration(){
            /*$registration = new \Vendor\Gestion\Registration();
            $this
                ->if($registration->usernameNotUsed("admin"))
                ->then
                ->*/
        }

        function testUsernameNotUsed(){
            $registration = new \Vendor\Gestion\Registration();
            $this
                ->variable($registration->usernameNotUsed("admin"))->isEqualTo(false);
        }
    }
}