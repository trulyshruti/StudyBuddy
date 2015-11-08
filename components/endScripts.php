<?php

?>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0Z26oStJlYOC9H0aUIhqzbrU-gyAbNHc&signed_in=true&callback=initMap" async defer></script>
	
    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <script src="/js/bootstrap-datetimepicker.min.js"></script>
    
    <!-- Date Time Picker -->
    <!-- BEGIN DATE TIME PICKER FUNCTION -->
    <script type="text/javascript">
	    $(function() {
    		$('#datetimepicker').datetimepicker({
      			language: 'en',
      			pick12HourFormat: true
    		});
    		
    		$('#datetimepicker3').datetimepicker({
		      pick12HourFormat: true,
		      pickDate: false
		    });
  		});
  	</script>
  	<!-- END DATE TIME PICKER FUNCTION CODE-->
  	
  	<script src="/js/geolocation.js"></script>

</body>

</html>