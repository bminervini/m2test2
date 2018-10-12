<?php

namespace Vendor\Mailing\tests\units
{

    use \atoum;

    class Mail extends atoum
    {

        public function testConstruct()
        {

            $sTo = "yannis.beaux@gmail.com";
            $sSubject = "Sujet du mail";
            $sBody = "Corps du mail";

            $this
                ->if($oInstance = new \Vendor\Mailing\Mail($sTo , $sSubject , $sBody))
                ->then
                ->phpArray($oInstance->getRecipients())
                    ->isEqualTo(
                        array(
                            $sTo
                        )
                    )
                ->string($oInstance->getSubject())
                    ->isEqualTo($sSubject)
                ->string($oInstance->getBody())
                    ->isEqualTo($sBody)
            ;
        }

        public function testGetRecipients()
        {
            
            $this
                ->given($oInstance = new \Vendor\Mailing\Mail())
                ->and($sRecipient1 = "exemple1@gmail.com")
                ->and($sRecipient2 = "exemple2@gmail.fr")
                ->and($oInstance->addRecipient($sRecipient1))
                ->and($oInstance->addRecipient($sRecipient2))
                ->then
                ->array($oInstance->getRecipients())
                    ->isEqualTo(
                        array(
                                $sRecipient1
                            ,   $sRecipient2
                        )
                    )
            ;
        }

        public function testGetSetSubject()
        {
            $this
                ->given($oInstance = new \Vendor\Mailing\Mail())
                ->and($sSubject = "Mail de test")
                ->if($oInstance->setSubject($sSubject))
                ->then
                ->string($oInstance->getSubject())
                    ->isEqualTo($sSubject)
            ;
        }
        
        public function testGetSetBody()
        {
            $this
                ->given($oInstance = new \Vendor\Mailing\Mail())
                ->and($sBody = "Corps de mail de test")
                ->if($oInstance->setBody($sBody))
                ->then
                ->string($oInstance->getBody())
                    ->isEqualTo($sBody)
            ;
        }
    }
}

?>