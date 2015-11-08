<?php
	
?>
	<div class="container" style="margin-top:100px;">
		
		<div class="row">
			<h3>Search results for - <i><?php echo strip_tags($_GET['q']) ?></i></h3>		
			<?php 
				include("backend/loadgroups.php");
			?>
		</div>
	</div>