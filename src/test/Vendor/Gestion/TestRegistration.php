<?php

namespace Vendor\Gestion\test\units 
{   
    use \atoum;
    //php applis/atoum/atoum.phar -f src/test/Vendor/Gestion/TestRegistration.php -bf src/test/.bootstrap.atoum.php

    class Registration extends atoum {

        function testRegistration(){
        
        }

        function testUsernameNotUsed(){
            $registration = new \Vendor\Gestion\Registration();
            $this
                ->variable($registration->usernameNotUsed("admin"))->isEqualTo(false);
        }

        /* Mail edu */

        function testMailIsCorrectOK(){
            $this
                ->variable(\Vendor\Gestion\Registration::mailIsCorrect("brand.brand@edu.univ-fcomte.fr"))->isEqualTo(true);
        }

        function testMailIsCorrectKO(){
            $this
                ->variable(\Vendor\Gestion\Registration::mailIsCorrect("brandbrand@edu.univ-fcomte.fr"))->isEqualTo(false);
        }

        /* Gmail */

        function testGmailIsCorrectOK(){
            $this
                ->variable(\Vendor\Gestion\Registration::gmailIsCorrect("brand@gmail.com"))->isEqualTo(true);
        }

        function testGmailIsCorrectKO(){
            $this
                ->variable(\Vendor\Gestion\Registration::gmailIsCorrect(".brand@gmail.com"))->isEqualTo(false);
        }
    }
}