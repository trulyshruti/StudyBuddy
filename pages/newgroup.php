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
	        <form role="form" action="backend/newgroup.php" method="post">
	            <div class="form-group">
	                <label for="Group-Name">Group Name:</label>
	              <input type="Group-Name" class="form-control" id="Group-Name" name="Group-Name">
	            </div>
	             <div class="form-group">
	               <label for="Subject">Subject:</label>
	             <input type="Subject" class="form-control" id="Subject" name="Subject">
	            </div>
	            <div class="form-group">
	               <label for="Description">Description:</label>
	             <input type="Description" class="form-control" id="Description" name="Description">
	            </div>
	            <div class="form-group">
	               <label for="Date-Time">Date/Time:</label>
	             <input type="Date-Time" class="form-control" data-format="dd/MM/yyyy hh:mm:ss" type="text" id="Date-Time" name="Date-Time">
	             <!-- <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input> -->
	              <div class='input-group date' id='datetimepicker'>
                    <!-- <input type='text' class="form-control" /> -->
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                 </div>
	            </div>
				<script type="text/javascript">
	    			$(function() {
    					$('#datetimepicker').datetimepicker({
      						language: 'en',
      						pick12HourFormat: true
    					});
  					});
  				</script>
	            <div class="form-group">
	               <label for="Days">Days:</label>
	             <input type="Days" class="form-control" id="Days" name="Days">
	            </div>
	            <div class="form-group">
	               <label for="Location">Location:</label>
	             <input type="Location" class="form-control" id="Location" name="Location">
	            </div>
	            <!-- BEGIN TAGS FORM INPUT --
	            <div class="form-group">
	               <label for="Tags">Tags:</label>
	             <input type="Tags" class="form-control" id="Tags" name="Tags">
	            </div>
	        	END TAGS FORM INPUT -->
	            <button type="submit" class="btn btn-default">Submit</button>
	        </form>
	      </div>
	     </div>
	    </div>
	</div>

	<?php include("components/endScripts.php"); ?>