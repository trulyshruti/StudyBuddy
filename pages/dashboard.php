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
				<h3>Recent Groups</h3>
				<div id="grouplist"></div>
				<center><img id="loading" src="img/loading.gif" alt="loading" style="width:200px;"></center>
			</div>
			
			<div class="col-sm-4">
				<a href="?p=newgroup" class="btn btn-lg">+ Create Group</a>
			</div>
		</div>
	</div>