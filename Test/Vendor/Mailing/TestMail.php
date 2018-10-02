<?php

namespace Mailing\tests\units
{

    use \atoum;

    class Mail extends atoum
    {

        public function testConstruct()
        {
            $sFrom = "m2test2.croissant.show@gmail.com";
            $sTo = "yannis.beaux@gmail.com";
            $sSubject = "Sujet du mail";
            $sBody = "Corps du mail";

            $this
                ->if($oInstance = new \Mailing\Mail($sFrom , $sTo , $sSubject , $sBody))
                ->then
                ->string($oInstance->getSender())
                    ->isEqualTo($sFrom)
                ->array($oInstance->getRecipients())
                    ->keys
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

        public function testGetSetSender()
        {
            $this
                ->given($oInstance = new \Mailing\Mail("" , "" , "" , "" , ""))
                ->and($sFrom = "m2test2.croissant.show@gmail.com")
                ->if($oInstance->setSender($sFrom))
                ->then
                ->string($oInstance->getSender())
                    ->isEqualTo($sFrom)
            ;
        }

        public function testGetRecipients()
        {
            $this
                ->given($oInstance = new \Mailing\Mail("" , "" , "" , "" , ""))
                ->and($sRecipient = "exemple@gmail.com")
                ->if($oInstance->addRecipient($sRecipient))
                ->then
                ->string($oInstance->getRecipient())
                    ->isEqualTo($sRecipient)
            ;
        }

        public function testGetSetSubject()
        {
            $this
                ->given($oInstance = new \Mailing\Mail("" , "" , "" , "" , ""))
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
                ->given($oInstance = new \Mailing\Mail("" , "" , "" , "" , ""))
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