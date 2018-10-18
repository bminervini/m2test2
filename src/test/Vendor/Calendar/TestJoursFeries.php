<?php

namespace Vendor\Calendar\test\units
{
    use \atoum;
    class JoursFeries extends atoum
    {
		// On prend une date connue qu'on passe en Timestamp UNIX avec strtotime
		// Ici, la date de Noel 
		public function testGetHolidays()
		{
			$this
				->if($year = 2018)
				->and($dateTest = strtotime("25-12-2018"))
				->then
					->integer($ms = getHolidays($year))
					->isEqualTo($dateTEst);
		}
	}
	
}
?>