<?php
/**
 * Created by IntelliJ IDEA.
 * User: baptiste
 * Date: 27/09/18
 * Time: 15:07
 */

namespace Calendar {

    use \DAO\Personne;

    class Chooser
    {
        public $subscribers = [];

        public function __construct($subs = [])
        {
            $this->subscribers = $subs;
        }

        public function chooseOne()
        {
            $choosen = 0;

            foreach ($this->subscribers as $key => $person)
            {
                $current = $person->getCroissantAmount();

                if (!isset($min) || $current < $min)
                {
                    $min = $current;
                    $choosen = $person;
                }
            }
            return $choosen;
        }

    };
}