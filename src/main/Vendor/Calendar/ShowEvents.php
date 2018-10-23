<?php

namespace Vendor\Calendar;

require_once __DIR__ . '/quickstart.php'; 
require_once __DIR__ . '/SubscribersList.php'; 
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/../DAO/DAO.php'; 

class ShowEvents {
	public $qs; 
	public $sublist; 
	public $dao; 
	public $client; 

function __construct($pseudo = null){
		$this->setup($pseudo);
		$this->add_events();
}

	function setup($pseudo){
		$this->qs = New quickstart(); 
		$this->dao = new \Vendor\DAO\DAO(); 
		$this->sublist = new SubscribersList($this->dao->getListPersonne('personne')); 
		$this->client = $this->qs->getClient($pseudo);
	}

	function chooseSomeone(){
		$res = $this->sublist->chooseOne(""); 
		return $res; 
	}
	
	function add_events(){
		if(isset($client)){
			$service = new \Google_Service_Calendar($this->client); 
			
			// Print the next 4 events on the user's calendar.
			$calendarId = 'primary';
			$optParams = array(
			  'maxResults' => 4,
			  'orderBy' => 'startTime',
			  'singleEvents' => true,
			  'timeMin' => date('c'),
			);
			$results = $service->events->listEvents($calendarId, $optParams);
			$events = $results->getItems();
			
			
			if (empty($events)) {
				print "No upcoming events found.\n";
			} else {
				foreach ($events as $event) {
					$start = $event->start->dateTime;
					if (empty($start)) {
						$start = $event->start->date;
					}
					$croissant = "Croissant"; 
					if(strpos($event->getSummary(), $croissant) !== false){
						$this->dao->addEvent($event->getStart()->dateTime); 
					}
				}
			}
			
		}
	}
	/*
	$results = $dao->getListPersonne('personne'); 
	$sublist->addSubscribers($results); */ 
}

					/*
					$results = $dao->getListPersonne('personne'); 
					$participants = 0; 
					
					foreach($results as $result) {
						if($result['statutParticipation']){
							$participants = $participants + 1; 
						}
					}; 
					$choosed = $sublist->chooseOne($participants);
					$dao->
					echo "
						<tr>
							<td><center>".$event->getStart()->dateTime."</center></td>
							<td><center>".$choosed['prenom']." ".$choosed['nom']."</center></td>";
				
					echo "
							<td><center>".$participants."</center></td>
						</tr>"
						; */ 
?>