<?php

namespace Mailing\tests\units
{

    use \atoum;

    class Mail extends atoum
    {

        public function testConstruct()
        {
            $sFrom      = "m2test2.croissant.show@gmail.com";
            $sTo        = "m2test2.croissant.show@gmail.com";
            $sSubject   = "Mail de test";
            $sBody      = "Corps de mail";

            $oInstance = new Mailing\Mail($sFrom , $sTo , $sSubject , $sBody);

        }
    }
}

?>