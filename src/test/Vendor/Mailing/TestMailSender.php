<?php

namespace Vendor\Mailing\tests\units
{

    use \atoum;

    class MailSender extends atoum
    {

        public function testGoodPort()
        {
            $sFrom = "m2test2.croissant.show@edu.univ-fcomte.fr";
            $sTo = "m2test2.croissant.show@gmail.com";
            $sSubject = "Je suis un mail généré par un test";
            $sBody = "Voilà je corps du mail, c'est un peu nul, mais je fais ce que je peux !";

            $this
                ->if($oResult = \Vendor\Mailing\MailSender::SendMail($sFrom , $sTo , $sSubject , $sBody))
                    ->boolean($oResult)
                        ->isEqualTo(true)
            ;
        }
    }
}

?>