<?php
/**
 * Created by IntelliJ IDEA.
 * User: baptiste
 * Date: 27/09/18
 * Time: 15:07
 */

namespace Calendar
{

    use \DAO\Personne;

    class SubscribersList
    {
        public $subscribers = [];

        public function __construct($subs = [])
        {
            $this->subscribers = $subs;
        }

        public function addSubscriber($sub)
        {
            $this->subscribers[$sub->getId()] = $sub;
        }

        public function addSubscribers($subs)
        {
            foreach ($subs as $key => $sub)
            {
                $this->addSubscriber($sub);
            }

        }

        public function isSub($sub)
        {
            return isset($this->subscribers[$sub->getId()]);
        }

        public function chooseOne()
        {
            if (count($this->subscribers) == 0)
            {
                return null;
            }

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

    }
}