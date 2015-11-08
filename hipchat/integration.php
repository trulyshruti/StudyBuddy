<?php

require_once("/StuddyBuddy/backend/mongo.php");
$mongo = new EasyMongo();

$_POST = json_decode(file_get_contents('php://input'));


// Default response
$default_reply = [
	"color" => "green",
	"message"=> "It's going to be sunny tomorrow! (yey)",
	"notify"=> false,
	"message_format"=> "text"
];

$validMessage = false;

// Chec post request is only for room_messages
if (isset($_POST->event)) { 
	if ($_POST->event == "room_message") {
		$validMessage = true;
	}
	else {
		$default_reply["message"] = "Found a non-valid event!";
	}
}
else {
	$default_reply["message"] = "No POST[event] passed" . print_r($_POST);
}

if (!$validMessage) {
	echo json_encode($default_reply);
	exit(0);
}

$message = $_POST->item->message->message;


// PRINT HELP MESSAGES
$helpCommandMatch = preg_match('/^\\/[qQaAcCrRtT] *$/', $message);

if ($helpCommandMatch == 1) {
	$default_reply["message"] = "help message";

	// QUESTION
	if ($message[1] == "q" || $message[1] == "Q") {
		$default_reply["message"] = 
			 "Submit a question:  /q  <Your question goes here>\n"
			."List a question:     /q  #<question ID>";
	}

	// ANSWER
	if ($message[1] == "a" || $message[1] == "A") {
		$default_reply["message"] = 
			 "Propose an answer:  /a  #<question ID>  <Your answer goes here>"; 
	}

	// COMMENT
	if ($message[1] == "c" || $message[1] == "C") {
		$default_reply["message"] = 
			 "Comment a question:  /c  #<Question ID>  <Your comment goes here>";
	}

	// REMINDER
	if ($message[1] == "r" || $message[1] == "R") {
		$default_reply["message"] = 
			 "Set a reminder:   /r  <MM-DD-YY>  <HH:MM>  <Description of the reminder>\n"
			."List a reminder:  /r  <MM-DD-YY  or 'today' for today's reminders"; 
	}

	// TESTS
	if ($message[1] == "t" || $message[1] == "T") {
		$default_reply["message"] = 
			 "Set a test:   /t  <Test's name>  <Test's description>\n".
			 "List a test:  /t  #<Test ID>";
	}

	echo json_encode($default_reply);
	exit(0);
}


// Determine message nature
// FIX MATCHING LATER
$goodMatch = preg_match('/^\\/[qQaAcCrRtT] +.*/', $message);

if ($goodMatch == 1) {
	$default_reply["message"] = "It matches !";


	// QUESTION
	if ($message[1] == "q" || $message[1] == "Q") {
		$args = preg_split('/ +/', $message);

		// FIX LATER
		if ($args[1][0] == "#") {
			unset($args[1][0]);
			//$id = implode("", $args[1]);
			$default_reply["message"] = "Listing a query " . $id;
		}

		// INSERT HERE
		else {
			unset($args[0]);
			$question = implode(" ", $args);

			$QTemplate = [
				"question" => $question,
				"answer" => []
			];

			$mongo->insert("QAs", $QTemplate);

			$default_reply["message"] = "Question submitted! ".$question;
		}
	}

	// ANSWER
	if ($message[1] == "a" || $message[1] == "A") {
		$args = preg_split('/ +/', $message);
		$id = $args[1];
		$answer = ""; 
		for ($i = 2; $i < sizeof($args); $i++) 
			$answer .= $args[$i]." ";

		$answer = rtrim($answer);


		$ATemplate = [
			"$push" => [ "answer" => $answer ]
		];

		$AQuery = [ "_id" => $id ];

		$mongo->update("QAs", $ATemplate, $AQuery);

		$default_reply["message"] = "Answer submitted! ".$id." - ".$answer;
	}

	// COMMENT
	if ($message[1] == "c" || $message[1] == "C") {
		$args = preg_split('/ +/', $message);
		$id = $args[1];
		$comment = ""; 
		for ($i = 2; $i < sizeof($args); $i++) 
			$comment .= $args[$i]." ";

		$comment = rtrim($comment);

		$default_reply["message"] = "Comment submitted! ".$id." - ".$comment;
	}

	// REMINDER
	if ($message[1] == "r" || $message[1] == "R") {
		$args = preg_split('/ +/', $message);
		$date = $args[1];
		$time = $args[2];
		$reminder = "";
		for ($i = 3; $i < sizeof($args); $i++) 
			$reminder .= $args[$i]." ";

		$reminder = rtrim($reminder);

		$default_reply["message"] = "Reminder submitted! ".$id." - ".$reminder;
	}

	// TESTS
	if ($message[1] == "t" || $message[1] == "T") {
		$args = preg_split('/ +/', $message);
		$title = $args[1];
		$description = "";
		for ($i = 2; $i < sizeof($args); $i++) 
			$description .= $args[$i]." ";

		$description = rtrim($description);
		$default_reply["message"] = "Test submitted! ".$id." - ".$description;		
	}

}
// REMOVE THIS LATER
else if ($goodMatch == 0) {
	;//$default_reply["message"] = "It doesn't match :(";
}
else {
	$default_reply["message"] = "Error x.x";
}



echo json_encode($default_reply);

?>