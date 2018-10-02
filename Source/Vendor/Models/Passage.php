<?php

class Passage{

    var $datePassage;
    var $status;

    function __construct($datePassage){
        $this->datePassage = $datePassage;
        $this->status = 0;
    }

    public function getDatePassage()
    {
        return $this->datePassage;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
         $this->status = $status;
    }

}



?>