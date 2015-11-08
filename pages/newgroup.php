<?php
	
	session_start();
	if($_SESSION['username'] == ""){
		header("Location: ./");
	}

	
	
?>
	<a  name="login-form"></a>
	<div class="content-section-a">
	    <div class="container">
	    <?php echo $GLOBALS['status']; ?>
	     <div class="row">
	      <div class="col-lg-5 col-sm-6">
	        <h2 class="section-heading">Create New Group</h2>
	        <form role="form" action="backend/newgroup.php" method="post">
	            <div class="form-group">
	                <label for="Group-Name">Group Name:</label>
	              <input type="Group-Name" class="form-control" id="Group-Name" name="name">
	            </div>
	             <div class="form-group">
	               <label for="Subject">Subject:</label>
	             <input type="Subject" class="form-control" id="Subject" name="subject">
	            </div>
	            <div class="form-group">
	               <label for="Description">Description:</label>
	             <input type="Description" class="form-control" id="Description" name="description">
	            </div>
	            <div class="form-group">
	            	<label for="Date-Time">Date:</label>
	             	<div id="datetimepicker" class="input-append">
				  		<div class="input-group">
							<input class="form-control" data-format="MM/dd/yyyy" placeholder="pick a date" name="date" type="text" value="<?php echo date('m/d/Y') ?>" style="height:46px;">
							<span class="input-group-btn add-on">
					        		<button class="btn webBtn" data-time-icon="icon-time" data-date-icon="icon-calendar"><span class="glyphicon glyphicon-calendar"></span></button>
							</span>
					  	</div>
					</div>
	             
                 </div>
                 <div class="form-group">
                 	<label for="Date-Time">Time:</label>
                 	<div id="datetimepicker3" class="input-append">
				  		<div class="input-group">
										<input class="form-control" data-format="hh:mm" placeholder="pick a start time" name="time" type="text" value="<?php echo date('H:i'); ?>" style="height:46px;">
								  		<span class="input-group-btn add-on">
							        		<button class="btn webBtn" data-time-icon="icon-time" data-date-icon="icon-calendar"><span class="glyphicon glyphicon-time"></span></button>
							      		</span>
						</div>
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
	               <select class="form-control" onchange="var days = document.getElementById('days'); if(this.value=='1'){days.style.display='none';}else{days.style.display='block';}">
	               	<option value="1">One Time</option>
	               	<option value="2">Repeated</option>
	               </select>
	            </div>
	            
	            <div id="days" class="form-group" style="display:none;">
	               	<input type="checkbox" name="day" value="1"> Mon &nbsp;
	               	<input type="checkbox" name="day" value="2"> Tues &nbsp;
	               	<input type="checkbox" name="day" value="3"> Wed &nbsp;
	               	<input type="checkbox" name="day" value="4"> Thurs &nbsp;
	               	<input type="checkbox" name="day" value="5"> Fri &nbsp;
	               	<input type="checkbox" name="day" value="6"> Sat &nbsp;
	               	<input type="checkbox" name="day" value="7"> Sun &nbsp;
	            </div>
	            
	            <div class="form-group">
	               <label for="Location">Location:</label>
	               <input type="Location" class="form-control" id="Location" name="Location" onchange="findlonglat(this.value)">
	            </div>
	            <!-- BEGIN TAGS FORM INPUT --
	            <div class="form-group">
	               <label for="Tags">Tags:</label>
	             <input type="Tags" class="form-control" id="Tags" name="Tags">
	            </div>
	        	END TAGS FORM INPUT -->
	        	<div style="display:none;">
		        	<input id="long" type="text" name="longitude" value="">
		        	<input id="lat" type="text" name="latitude" value="">
		        </div>
	            <button type="submit" class="btn btn-default">Submit</button>
	        </form>
	      </div>
	     </div>
	    </div>
	</div>

	<?php include("components/endScripts.php"); ?>