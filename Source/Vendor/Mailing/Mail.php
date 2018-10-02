<?php 

namespace Mailing;

    class Mail
    {

        var $m_sRecipient;      //< Mail's recipient
        var $m_aRecipients;     //< The array of recipients
        var $m_sSender;         //< Mail's sender
        var $m_sSubject;        //< Mail's subject
        var $m_sBody;           //< Mail's body

        public function __construct(
                $sFrom = 'm2test2.croissant.show@gmail.com'
            ,   $sTo = array()
            ,   $sSubject = 'Mail de test' 
            ,   $sBody = 'Corps de mail')
        {
            $this->m_sSender = $sFrom;
            $this->m_aRecipients = $sTo;
            $this->m_sSubject = $sSubject;
            $this->m_sBody = $sBody;
        }

        //---- GETTERS ----

        public function getSender()
        {
            return $this->m_sSender;
        }

        public function getRecipients()
        {
            return $this->m_aRecipients;
        }

        public function getSubject()
        {
            return $this->m_sSubject;
        }

        public function getBody()
        {
            return $this->m_sBody;
        }

        //---- SENDERS ----

        public function setSender($sSender)
        {
            $this->m_sSender = $sSender;
        }

        public function addRecipient($sRecipient)
        {
            array_push($this->m_aRecipients , $sRecipient);
        }

        public function setSubject($sSubject)
        {
            $this->m_sSubject = $sSubject;
        }

        public function setBody($sBody)
        {
            $this->m_sBody = $sBody;
        }


    }
?>