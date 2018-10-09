<?php
//namespace Calendar;

include("quickstart.php"); 
require __DIR__ . '/vendor/autoload.php';

//echo $createdEvent->getId();
	$qs = New quickstart(); 
	

	// Get the API client and construct the service object.
	$client = $qs->getClient();
	$service = new Google_Service_Calendar($client);
	
	// Print the next 10(4) events on the user's calendar.
	$calendarId = 'primary';
	$optParams = array(
	  'maxResults' => 10,
	  'orderBy' => 'startTime',
	  'singleEvents' => true,
	  'timeMin' => date('c'),
	);
	$results = $service->events->listEvents($calendarId, $optParams);
	$events = $results->getItems();

	if (empty($events)) {
		print "No upcoming events found.\n";
	} else {
		echo "<table border=\"1\">
				<tr>
					<th>Mercredi</th>
					<th>L'&eacutelu</th>
					<th>Participe</th>
					<th>Ne participe pas</th> 
				</tr>"; 
		foreach ($events as $event) {
			$start = $event->start->dateTime;
			if (empty($start)) {
				$start = $event->start->date;
			}
			$croissant = "Croissant"; 
			if(strpos($event->getSummary(), $croissant) !== false){
				$day = date('l',$event->getStart()->date); 
				echo "
					<tr>
						<td>".$day." | ".$event->getStart()->dateTime."</td>
						<td>IL A ETE CHOISI</td>
						<td>BOUTON BOOTSTRAP VALIDER</td>
						<td>BOUTON BOOTSTRAP REFUSER</td>
					</tr>"
					; 
				//echo "<br><br><br>Ici : ".($event->getStart()->date)->format('Y-m-d H:i:s')."<br><br><br>"; 
			}
		}
		echo "</table>"; 
	}
?>