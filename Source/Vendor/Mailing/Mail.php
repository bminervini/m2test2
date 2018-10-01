

<?php

class Mail
{

    var $m_sRecipient;      //< Mail's recipient
    var $m_sSender;         //< Mail's sender
    var $m_sSubject;    //< Mail's subject
    var $m_sBody;       //< Mail's body

    public function __construct($sFrom , $sTo , $sSubject , $sBody)
    {
        $this->m_sRecipient = $sTo;
        $this->m_sSender = $sFrom;
        $this->m_sSubject = $sSubject;
        $this->m_sBody = $sBody;
    }

    public function getRecipient()
    {
        return $this->m_sRecipient;
    }

    public function getSender()
    {
        return $this->m_sSender;
    }

    public function getSubject()
    {
        return $this->m_sSubject;
    }

    public function getBody()
    {
        return $this->m_sBody;
    }
}

?>