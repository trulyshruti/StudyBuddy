<?php
	
	DEFINE ('DB_USER', 'root');
	DEFINE ('DB_PASSWORD', 'Controlzero0');
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_NAME', 'StuddyBuddy');
	
	
	$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ('Could not connect to
	MySQL: ' . mysqli_connect_error() );