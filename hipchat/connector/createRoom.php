<?php

function createRoom($room_name, $topic)
{
	$authorization = "Bearer HZAhUTcb9qAXxE3HGHsMZCat8In9LfZajEaEPQqO";
	$json = "application/json";

	$url = "http://api.hipchat.com/v2/room";
	$curl = curl_init();

	$data = [
		"name" => $room_name,
		"topic" => $topic
	];

	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $url,
		CURLOPT_USERAGENT => "StudyBuddy CURL Agent",
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => json_encode($data)
	));


	// Headers
	$request_headers = array(
		"Authorization: ".$authorization,
		"Accept: ".$json,
		"Content-Type: ".$json
	);

	curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);


	// Execute the curl call
	$response = curl_exec($curl);

	curl_close($curl);

	return $response;
}


// Get arguments
$roomName = (isset($_POST["roomName"]) && $_POST["roomName"] != "") ? $_POST["roomName"] : $argv[1];
$topic = (isset($_POST["roomName"]) && $_POST["roomName"] != "") ? $_POST["topic"] : $argv[2];

// Extra validation
if ($roomName == "" || $topic == "") {
	echo json_encode([
		"error" => true,
		"message" => "Bad parameters passed"
	]);
}

$response = createRoom($roomName, $topic);

echo $response;

?>