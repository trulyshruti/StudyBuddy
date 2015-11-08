<?php
	
	session_start();
	if($_SESSION['username'] == ""){
		header("Location: ./");
	}
	
?>
	<div class="container" style="margin-top:100px; min-height:700px;">
		<div class="row">
			<div class="col-sm-8">
				<h1 style="margin:0;">Dashboard</h1>
				<hr>
				<?php include("backend/loadgroups.php"); ?>
			</div>
			
			<div class="col-sm-4">
				<a href="?p=newgroup" class="btn btn-lg">+ Create Group</a>
			</div>
		</div>
	</div>