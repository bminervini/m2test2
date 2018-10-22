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
            $sSender = "expediteur@univ-fcomte.fr";

            $this
                ->given($oInstance = new \Vendor\Mailing\MailSender($sLogin , $sPassword , $sSender))

                ->if($oResult = $oInstance->sendMail(new \Vendor\Mailing\Mail("m2test2.croissant.show@gmail.com" , "Sujet" , "Corps")))
                    ->boolean($oResult)
                        ->isEqualTo(false)
            ;
        }

        public function testBadCredentials()
        {
            $sLogin = "m2test2.croissant.show@gmail.com";
            $sPassword = "mauvaismotdepasse";
            $sSender = "expediteur@univ-fcomte.fr";

            $this
            ->given($oInstance = new \Vendor\Mailing\MailSender($sLogin , $sPassword , $sSender))
            ->if($oResult = $oInstance->sendMail(new \Vendor\Mailing\Mail("m2test2.croissant.show@gmail.com" , "Sujet" , "Corps")))
                ->boolean($oResult)
                    ->isEqualTo(false)
        ;
        }

        public function testSendMailSuccess()
        {
            $sLogin = "ybeaux";
            $sPassword = "Cestpasfaux!120";
            $sSender = "m2test2.croissant.show@edu.univ-fcomte.fr";

            $this
            ->given($oInstance = new \Vendor\Mailing\MailSender($sLogin , $sPassword , $sSender))
            ->if($oResult = $oInstance->sendMail(new \Vendor\Mailing\Mail("m2test2.croissant.show@gmail.com" , "Sujet" , "Corps")))
                ->boolean($oResult)
                    ->isEqualTo(true)
        ;
        }
    }
}

?>