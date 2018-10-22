<?php
/**
 * Created by IntelliJ IDEA.
 * User: baptiste
 * Date: 27/09/18
 * Time: 15:07
 */

namespace Vendor\Calendar
{


    class SubscribersList
    {
        public $subscribers = [];

        public function __construct($subs = [])
        {
            $this->subscribers = $subs;
        }

        public function addSubscriber($sub)
        {
            $this->subscribers[$sub['idPersonne']] = $sub;
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
            return isset($this->subscribers[$sub['idPersonne']]);
        }

        public function chooseOne($participants)
        {
            if (count($this->subscribers) == 0)
            {
                return null;
            }

            $choosen = 0;

            foreach ($this->subscribers as $key => $person)
            {
                $current = $person['nbreCroissantAmene'];
				echo $person['statutParticipation']; 
                if ((!isset($min) || $current < $min) && strcmp($person['statutParticipation'],"1"))
                {
                    $min = $current;
					$choosed = $person; 
                }
            }
			var_dump($choosed); 
            return $choosed;
        }

    }
}