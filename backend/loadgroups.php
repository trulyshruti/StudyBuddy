<?php
	
	$numberToOutput = strip_tags($_GET['n']);
	$query = strip_tags($_GET['q']);
	$type = strip_tags($_GET['t']);
	
	if($query != ""){
		$query = "WHERE name LIKE '%{$query}%'";
	}
	
	if($type != ""){
		$type = "AND subject='$subject'";
	}
	
	if($numberToOutput == ""){
		$numberToOutput = "5";
	}
	
	include("mysqli_connection.php");
	
	$q = "SELECT * FROM groups $query $type LIMIT $numberToOutput";
	$r = @mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) >= 1){
		while($row = $r->fetch_assoc()) {
			echo "
					<div class='panel well'>
						<a href='?p=group&id=".$row['id']."'<strong>".$row['name']."</strong><br>
						<p>".$row['description']."</p>
					</div>
				";	
		}
	} else{
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
	
	
?>