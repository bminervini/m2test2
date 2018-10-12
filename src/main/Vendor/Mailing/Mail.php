<?php 

namespace Vendor\Mailing;


    class Mail
    {

        var $m_aRecipients;     //< The array of recipients
        var $m_sSubject;        //< Mail's subject
        var $m_sBody;           //< Mail's body

        public function __construct(
                $sTo = array()
            ,   $sSubject = 'Mail de test' 
            ,   $sBody = 'Corps de mail')
        {
            //No array given protection
            if (!is_array($sTo))
            {
                $this->m_aRecipients = array($sTo);
            }else 
            {
                $this->m_aRecipients = array();
            }

            $this->m_sSubject = $sSubject;
            $this->m_sBody = $sBody;
        }

        //---- GETTERS ----

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