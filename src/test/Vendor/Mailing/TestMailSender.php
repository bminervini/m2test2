<?php

namespace Vendor\Mailing\tests\units
{

    use \atoum;

    class MailSender extends atoum
    {

        public function testBadSender()
        {
            $sLogin = "m2test2uneadressemailquinexistepas@domainequinexistepas.com";
            $sPassword = "unmotedepassequinexistepas";

            $this
                ->given($oInstance = new \Vendor\Mailing\MailSender($sLogin , $sPassword))
                ->if($oResult = $oInstance->sendMail(new \Mailing\Mail("65m2test2.croissant.show@gmail.com" , "Sujet" , "Corps")))
                    ->boolean($oResult)
                        ->isEqualTo(false)
            ;
        }

        public function testBadCredentials()
        {
            $sLogin = "m2test2.croissant.show@gmail.com";
            $sPassword = "mauvaismotdepasse";

            $this
            ->given($oInstance = new \Vendor\Mailing\MailSender($sLogin , $sPassword))
            ->if($oResult = $oInstance->sendMail(new \Mailing\Mail("65m2test2.croissant.show@gmail.com" , "Sujet" , "Corps")))
                ->boolean($oResult)
                    ->isEqualTo(false)
        ;
        }
    }
}

?>