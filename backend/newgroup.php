<?php
	
	require_once("/StuddyBuddy/backend/hipchat.php");
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$name = strip_tags($_POST['name']);
		$description = strip_tags($_POST['description']);
		$subject = strip_tags($_POST['subject']);
		$longitude = strip_tags($_POST['longitude']);
		$latitude = strip_tags($_POST['latitude']);
		$date = strip_tags($_POST['date']);
		$day = strip_tags($_POST['day']);
		$time = strip_tags($_POST['time']);
		
		$days = "";
			
			if (!empty($day)) {
				
				$count = 1;
				
				foreach($day as $c) {
			
					switch ($c) {
					
						case "1":
							$days.= " Monday";
							break;
				
						case "2":
							$days.= " Tuesday";
							break;
				
						case "3":
							$days.= " Wednesday";
							break;
				
						case "4":
							$days.= " Thursday";
							break;
				
						case "5":
							$days.= " Friday";
							break;
				
						case "6":
							$days.= " Saturday";
							break;
							
						case "7":
							$days.= " Sunday";
						break;
					}
			
					if ($count < count($day)) {
						$days.= ",";
					}
			
					$count++;
				}
			}
			
			else{
				$days = "Once";
			}
		
		
		include("input_filter.php");
		$filter = new InputFilter();
		
		if($filter->isFilled(array($name, $description, $subject, $date, $days, $time))){
			
			
			$response = json_decode(Hipchat::createRoom($name, $description));
			if (isset($response->error)){
				$GLOBALS['status'] =  "<p class='error-msg'>Chat Room Name is Taken</p>";
			} else{
				
				$hipchatid = $response->id;
				
				session_start();
				include("mysqli_connection.php");
				$q = "INSERT INTO groups (hostid, name, description, subject, longitude, latitude, meeting_date, meeting_days, meeting_start, hipchat_id)
					  VALUES ('".$_SESSION['id']."', '$name', '$description', '$subject', '$longitude', '$latitude', '$date', '$days', '$time', '$hipchatid')";
				$r = @mysqli_query($dbc, $q);
				
				if($r){
					$GLOBALS['status'] =  "<p class='success-msg'>Group Created Successfully</p>";
					header("Location: ../../");
				} else{
					$GLOBALS['status'] =  "<p class='error-msg'>Failed to create group</p>";
				}
				
			}
				
			
		} else{
			$GLOBALS['status'] =  "<p class='error-msg'>Please Fill All Fields</p>";
			echo $days;
		}
		
	}
	
	echo $GLOBALS['status'];
	
?>