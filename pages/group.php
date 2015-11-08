<?php 
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	$GLOBALS['id'] = strip_tags($_GET['id']);
	
	if($GLOBALS['id'] != ""){
		include("backend/mysqli_connection.php");
		$q = "SELECT * FROM groups WHERE gid=".$GLOBALS['id']." AND islive='true'";
		$r = @mysqli_query($dbc, $q);
		
		if(mysqli_num_rows($r) == 1){
			$row = mysqli_fetch_array($r);
			
			$GLOBALS['name'] = $row['name'];
			$GLOBALS['description'] = $row['description'];
			$GLOBALS['hostid'] = $row['hostid'];
			$GLOBALS['subject'] = $row['subject'];
			$GLOBALS['longitude'] = $row['longitude'];
			$GLOBALS['latitude'] = $row['latitude'];
			$GLOBALS['meeting_date'] = $row['meeting_date'];
			$GLOBALS['meeting_days'] = $row['meeting_days'];
			$GLOBALS['meeting_start'] = $row['meeting_start'];
			$GLOBALS['hipchatid'] = $row['hipchat_id'];
			
		} else{
			header("Location: ./");
		}
	} else{
		header("Location: ./");
	}
	
?>
	<div class="container" style="margin-top:100px; min-height:500px;">
		<div class="row">
			
			<div class="col-sm-8">
				<div id="heading">
					<h1 style="margin:0;"><?php echo $GLOBALS['name']; ?></h1>
					<h3 style="margin:0">in <?php echo $GLOBALS['subject']; ?></h3>
					<br>
					<p>
						<?php echo $GLOBALS['description']; ?>
					</p>
				</div>
				
				<div id="qa" style="margin-top:25px;">
					
					<?php 
						
						include("/StuddyBuddy/backend/mongo.php");
						
						echo "<h4>Questions & Answers</h4>";
						$mongo = new EasyMongo();
						/*
						$QAs = $mongo->select("QAs");
						
						print_r($QAs);
						/*
						foreach($QAs as $QA){
							echo "
							
									<div class='panel well'>
										<h5>".$QA["answer"]."</h5>
									</div>
							
							
							     ";
						}
						*/
						
						
						echo "<h4 style='margin-top:50px;'>Reminders</h4>";
						$Reminders = $mongo->select("Reminders");
						//print_r($Reminders);
						
						foreach($Reminders as $Reminder){
							echo "
							
									<div class='panel well'>
										<h5>".$Reminder["Description"]."</h5>
										Date: ".$Reminder["date"]." &nbsp;&nbsp;&nbsp; Time: ".$Reminder["time"]." 
									</div>
							
							
							     ";
						}
						
						
						echo "<h4 style='margin-top:50px;'>Tests</h4>";
						$Tests = $mongo->select("Tests");
						//print_r($Reminders);
						
						foreach($Tests as $Test){
							echo "
							
									<div class='panel well'>
										<h5>".$Test["title"]."</h5>
										".$Test["description"]."
									</div>
							
							
							     ";
						}
						
						
						
					?>
				</div>
			</div>
			
			<div class="col-sm-4">
				<div class="panel well">
					<a href="https://studybuddy.hipchat.com/chat/room/<?php echo $GLOBALS['hipchatid']; ?>" target="_blank">Chat Room</a>
					<br><br>
					<p>
						Meeting Date: <?php echo $GLOBALS['meeting_date'] ?><br>
						Meeting Start: <?php echo $GLOBALS['meeting_start'] ?><br>
					</p>
				</div>
				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:500px;width:100%;"><div id="gmap_canvas" style="height:300px;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(<?php echo $GLOBALS['latitude'] ?>, <?php echo $GLOBALS['longitude'] ?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo $GLOBALS['latitude'] ?>, <?php echo $GLOBALS['longitude'] ?>)});infowindow = new google.maps.InfoWindow({content:"<b><?php echo $GLOBALS['name'] ?><br/>" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>

			</div>
		</div>
		
	</div>