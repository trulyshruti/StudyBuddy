<?php
	
	/*
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	*/
	
	$lon = $_GET['lon'];
	$lat = $_GET['lat'];
	$query = strip_tags($_GET['q']);
	$type = strip_tags($_GET['t']);
	
	$sql = "";
	
	if($query != ""){
		$sql = "WHERE name LIKE '%{$query}%' OR description LIKE '%{$query}%'";
	}
	
	if($type != ""){
		$sql = "subject='$subject'";
	}
	
	include("input_filter.php");
	$filter = new InputFilter();
	if($filter->isFilled(array($query, $type))){
		$sql = "WHERE name LIKE '%{$query}%' OR description LIKE '%{$query}%' AND subject='$subject'";
	}
	
	include("mysqli_connection.php");
	
	$q = "SELECT * FROM groups WHERE islive='true' ORDER BY gid DESC LIMIT 5";
	
	if($sql != ""){
		$q = "SELECT * FROM groups $sql AND islive='true' ORDER BY gid DESC LIMIT 5";
	}
	
	$r = @mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) >= 1){
		
		while($row = $r->fetch_assoc()) {
			
			
			$raw =  curl("https://maps.googleapis.com/maps/api/distancematrix/json?origins=$lat,$lon&destinations=".$row['latitude'].",".$row['longitude']."&units=imperial&key=AIzaSyB0Z26oStJlYOC9H0aUIhqzbrU-gyAbNHc");
			$json = json_decode($raw);
			$distance = $json->rows[0]->elements[0]->distance->text;
			$destination = $json->destination_addresses[0];
			
			echo "
					<div class='panel well'>
						<strong><a href='?p=group&id=".$row['gid']."'>".$row['name']."</a></strong> <span style='font-size:10px;'>in ".$row['subject']."</span><br>
						<p style='margin:0;'>".$row['description']."</p>
						<p style='font-size:10px;'>".$row['meeting_date']." @ ".$row['meeting_start']." on ".$row['meeting_days']."</p>
						$destination <u><strong>Distance: $distance</strong></u><br>
						<a href='https://studybuddy.hipchat.com/chat/room/".$row['hipchat_id']."' target='_blank'>Chat Room</a>
					</div>
				";	
		}
	} else{
		if($query != ""){
			echo "
				
				Your search - $query - did not match any groups.
				<br>
				Suggestions:
				<br>
				<ul>
					<li>Make sure all words are spelled correctly.</li>
					<li>Try different keywords.</li>
					<li>Try more general keywords.</li>
				</ul>
		
		
			 ";	
		} else {
			echo "There are no study groups in your area.";
		}
	}
	
	function curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
	
?>