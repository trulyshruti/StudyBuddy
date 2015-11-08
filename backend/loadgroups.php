<?php
	
	$numberToOutput = strip_tags($_GET['n']);
	$query = strip_tags($_GET['q']);
	$type = strip_tags($_GET['t']);
	
	if($query != ""){
		$query = "WHERE name LIKE '%{$query}%' OR description LIKE '%{$query}%'";
	}
	
	if($type != ""){
		$type = "AND subject='$subject'";
	}
	
	if($numberToOutput == ""){
		$numberToOutput = "5";
	}
	
	include("backend/mysqli_connection.php");
	
	$q = "SELECT * FROM groups $query $type LIMIT $numberToOutput";
	$r = @mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) >= 1){
		while($row = $r->fetch_assoc()) {
			echo "
					<div class='panel well'>
						<strong><a href='?p=group&id=".$row['id']."'>".$row['name']."</a></strong> <span style='font-size:10px;'>in ".$row['subject']."</span><br>
						<p style='margin:0;'>".$row['description']."</p>
						<p style='font-size:10px;'>".$row['meeting_date']." from ".$row['meeting_time_start']." to ".$row['meeting_time_end']." on ".$row['meeting_days']."</p>
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
		}
	}
	
	
?>