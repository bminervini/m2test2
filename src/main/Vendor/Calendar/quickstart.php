<?php

namespace Vendor\Calendar;

//require_once 'google/apiclient'; 

require __DIR__ . '/vendor/autoload.php';


class quickstart 
{
 function __construct()
     {
			//$ms = getClient(); 
     }
 
 
function getClient()
{
    $client = new \Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(\Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');
	$tokenPath = 'token.json';
	//echo 'ici'; 
	if(!file_exists($tokenPath)){
					// Request authorization from the user.
					$authUrl = $client->createAuthUrl();
					echo 'Voici le lien d\'activation de l\'application : <a href=\''.$authUrl.'\' target="_blank">Ici</a>';
					echo '
						<form method="get">
							<table>
								<tr>
									<td>
										<input name="code_google" type="text">
									</td>
									<td>
										<input type="submit" value="Envoyer">
									</td>
								</tr>
							</table>
						</form>'; 
		
		if(isset($_GET['code_google'])){
			// Load previously authorized token from a file, if it exists.
			if (file_exists($tokenPath)) {
				$accessToken = json_decode(file_get_contents($tokenPath), true);
				$client->setAccessToken($accessToken);
			}

			// If there is no previous token or it's expired.
			if ($client->isAccessTokenExpired()) {
				// Refresh the token if possible, else fetch a new one.
				if ($client->getRefreshToken()) {
					$client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
				} else {
						$authCode = $_GET['code_google']; 
					if($authCode != null){
					  //  $authCode = trim(fgets(STDIN));

						// Exchange authorization code for an access token.
						$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
						$client->setAccessToken($accessToken);
						// Check to see if there was an error.
						if (array_key_exists('error', $accessToken)) {
							throw new Exception(join(', ', $accessToken));
						}
					}
				}
				// Save the token to a file.
				if (!file_exists(dirname($tokenPath))) {
					mkdir(dirname($tokenPath), 0700, true);
				}
				file_put_contents($tokenPath, json_encode($client->getAccessToken()));
			}
			return $client;
		}
	} else {
		if (file_exists($tokenPath)) {
				$accessToken = json_decode(file_get_contents($tokenPath), true);
				$client->setAccessToken($accessToken);
			}

			// If there is no previous token or it's expired.
			if ($client->isAccessTokenExpired()) {
				// Refresh the token if possible, else fetch a new one.
				if ($client->getRefreshToken()) {
					$client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
				} else {
						$authCode = $_GET['code_google']; 
					if($authCode != null){
					  //  $authCode = trim(fgets(STDIN));

						// Exchange authorization code for an access token.
						$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
						$client->setAccessToken($accessToken);
						// Check to see if there was an error.
						if (array_key_exists('error', $accessToken)) {
							throw new Exception(join(', ', $accessToken));
						}
					}
				}
				// Save the token to a file.
				if (!file_exists(dirname($tokenPath))) {
					mkdir(dirname($tokenPath), 0700, true);
				}
				file_put_contents($tokenPath, json_encode($client->getAccessToken()));
			}
			return $client;
	}
}

/*

// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);


$event = new Google_Service_Calendar_Event(array(
  'summary' => 'Google I/O 2018',
  'location' => '800 Howard St., San Francisco, CA 94103',
  'description' => 'A chance to hear more about Google\'s developer products.',
  'start' => array(
    'dateTime' => '2018-10-02T09:00:00-07:00',
    'timeZone' => 'Europe/Paris',
  ),
  'end' => array(
    'dateTime' => '2018-10-02T17:00:00-07:00',
    'timeZone' => 'Europe/Paris',
  ),
  'recurrence' => array(
    'RRULE:FREQ=DAILY;COUNT=2'
  ),
  'attendees' => array(
    array('email' => 'lpage@example.com'),
    array('email' => 'sbrin@example.com'),
  ),
  'reminders' => array(
    'useDefault' => FALSE,
    'overrides' => array(
      array('method' => 'email', 'minutes' => 24 * 60),
      array('method' => 'popup', 'minutes' => 10),
    ),
  ),
));

$calendarId = 'primary';
$event = $service->events->insert($calendarId, $event);
printf('Event created: %s\n', $event->htmlLink);
*/
}
?>