<?php

namespace Vendor\Calendar;

require_once __DIR__ . '/quickstart.php'; 
require_once __DIR__ . '/SubscribersList.php'; 
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/../DAO/DAO.php'; 

public $qs; 
public $sublist; 
public $dao; 
public $client; 

function __construct(){
}

function setup(){
	$this->qs = New quickstart(); 
	$this->sublist = new SubscribersList(); 
	$this->dao = new \Vendor\DAO\DAO(); 
	$this->client = $qs->getClient();
}

function add_events(){
	setup(); 
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
			/*
			echo "<table border=\"1\">
					<tr>
						<th>Mercredi</th>
						<th>L'&eacutelu</th>
						<th>Participants : </th>
					</tr>"; 
			*/
			foreach ($events as $event) {
				$start = $event->start->dateTime;
				if (empty($start)) {
					$start = $event->start->date;
				}
				$croissant = "Croissant"; 
				if(strpos($event->getSummary(), $croissant) !== false){
					$this->dao->$event->getStart()->dateTime; 
					
				}
			}
		//	echo "</table>";
			//var_dump($dao->getListPersonne('personne')); 
		}
		
	}
}
	$results = $dao->getListPersonne('personne'); 
	$sublist->addSubscribers($results); 
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