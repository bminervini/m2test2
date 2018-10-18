<?php

namespace Vendor\Calendar\test\units
{
    use \atoum;
    class SubscribersList extends atoum
    {

        var $day;


        function mockPerson($id = 0, $croissant = 0, $disponible = true)
        {
            $person = new \Mock\DAO\Personne\Personne();
            $this->calling($person)->getId = $id;
            $this->calling($person)->getCroissantAmount = $croissant;
            $this->calling($person)->isDisponible = $disponible;
            return $person;
        }
        function getTime()
        {
            print_r("ns : ".__NAMESPACE__);
            return time();
        }

        function initContext()
        {

            $day = $this->getTime();
            $fred = $this->mockPerson(1, 1);
            $fab = $this->mockPerson(2, 2);	
            $jub = $this->mockPerson(3, 3);
            $clang = $this->mockPerson(4, 4);

            $subs = [$fred, $fab];
            $subs2 = [$jub, $clang];

            return ['subs' => $subs, 'subs2' => $subs2];
        }

        public function testEmptyInit( )
        {

            $this
                ->if($list = new \Vendor\Calendar\SubscribersList())
                ->then
                ->array($list->subscribers)
                ->and
                ->integer(count($list->subscribers))
                    ->isEqualTo(0);
        }
        public function testNoSubChoice()
        {
            $day = time();
            $this
                ->if($list = new \Vendor\Calendar\SubscribersList())
                ->then
                ->variable($list->chooseOne($day))
                    ->isEqualTo(null);
        }
        public function testPopulatedChoice( )
        {
            $fred = $this->mockPerson(1);
            $day = $this->getTime();
            $this
                ->if($list = new \Vendor\Calendar\SubscribersList([$fred]))
                ->then
                ->object($list->chooseOne($day))
                ->isIdenticalTo($fred);

        }

        public function testMultiplePersonChoice( )
        {
            $fred = $this->mockPerson(1, 8);
            $fab = $this->mockPerson(1, 7);
            $a = $this->mockPerson(1, 14);
            $b = $this->mockPerson(1, 85);
            $day = $this->getTime();
            $this
                ->given($subs = [$fred, $fab, $a, $b])
                ->and($length = count($subs))
                ->if($list = new \Vendor\Calendar\SubscribersList($subs))
                ->then
                ->object($list->chooseOne($day))
                ->isIdenticalTo($fab)
                ->and
                ->integer(count($list->subscribers))
                ->isEqualTo($length);

        }

        public function testAddSubscribers( )
        {
            $context = $this->initContext();
            $subs = $context['subs'];
            $length = count($subs);
            $jub = $this->mockPerson(count($subs) + 1);
            $this
                ->if($list = new \Vendor\Calendar\SubscribersList($subs))
                ->and($list->addSubscriber($jub))
                ->then
                ->integer(count($list->subscribers))
                ->isEqualTo($length + 1);

        }
        public function testAddMultipleSubs( )
        {
            $context = $this->initContext();
            $subs = $context['subs'];
            $subs2 = $context['subs2'];
            $length = count($subs);
            $length2 = count($subs2);
            $this
                ->given()
                ->if($list = new \Vendor\Calendar\SubscribersList($subs))
                ->and()
                ->and($list->addSubscribers($subs2))
                ->then
                ->integer(count($list->subscribers))
                ->isEqualTo($length + $length2);
        }

        public function testWithUndisponiblePersons()
        {
            $fred = $this->mockPerson(1, 8, true);
            $fab = $this->mockPerson(1, 7, false);
            $a = $this->mockPerson(1, 14, true);
            $b = $this->mockPerson(1, 85, true);
            $subs = [$fred, $fab, $a, $b];
            $day = $this->getTime();
            $this
                ->if($list = new \Vendor\Calendar\SubscribersList($subs))
                ->then
                ->object($list->chooseOne($day))
                ->isIdenticalTo($fred);
        }

    }
}