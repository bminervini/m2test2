<?php

namespace Calendar\tests\units
{
    use \atoum;
    class Chooser extends atoum
    {

        public function testEmptyInit( ) {

            $this
                ->if($chooser = new \Calendar\Chooser())
                ->then
                ->array($chooser->subscribers)
                ->and
                ->integer(count($chooser->subscribers))
                    ->isEqualTo(0);
        }

        public function testPopulatedChoice( ) {

            $this
                ->given($fred = new \Mock\DAO\Personne())
                ->and($this->calling($fred)->getFirstName = 'Efrd')
                ->and($this->calling($fred)->getName = 'Audeda')
                ->and($this->calling($fred)->getCroissantAmount = 8)
                ->if($chooser = new \Calendar\Chooser([$fred]))
                ->then
                ->object($chooser->chooseOne())
                ->isIdenticalTo($fred);

        }

        public function testMultiplePersonChoice( ) {

            $this
                ->given($fred = new \Mock\DAO\Personne())
                ->and($this->calling($fred)->getCroissantAmount = 8)

                ->and($fab = new \Mock\DAO\Personne())
                ->and($this->calling($fab)->getCroissantAmount = 7)

                ->and($a = new \Mock\DAO\Personne())
                ->and($this->calling($a)->getCroissantAmount = 14)

                ->and($b = new \Mock\DAO\Personne())
                ->and($this->calling($b)->getCroissantAmount = 85)

                ->if($chooser = new \Calendar\Chooser([$fred, $fab]))
                ->then
                ->object($chooser->chooseOne())
                ->isIdenticalTo($fab);

        }
    }
}