<?php
	
	session_start();
	if($_SESSION['username'] == ""){
		header("Location: ./");
	}
	
?>
	<a  name="login-form"></a>
	<div class="content-section-a">
	    <div class="container">
	     <div class="row">
	      <div class="col-lg-5 col-sm-6">
	        <h2 class="section-heading">&nbsp;</h2>
	        <form role="form" action="backend/login.php" method="post">
	            <div class="form-group">
	                <label for="name">Name:</label>
	              <input type="name" class="form-control" id="name" name="name">
	            </div>
	            <div class="form-group">
	               <label for="Description">Description:</label>
	             <input type="Description" class="form-control" id="password" name="Description">
	            </div>
	                        <div class="form-group">
	               <label for="Subject">Subject:</label>
	             <input type="Subject" class="form-control" id="Subject" name="Subject">
	            </div>
	          
	            <div class="form-group">
	               <label for="Tags">Tags:</label>
	             <input type="Tags" class="form-control" id="Tags" name="Tags">
	            </div>
	            <button type="submit" class="btn btn-default">Submit</button>
	        </form>
	      </div>
	     </div>
	    </div>
	</div>