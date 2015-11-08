<?php
	
	class InputFilter{
		
		function isFilled($inputArray){
			foreach($inputArray as $input){
				if($input == ""){
					return false;
				}
			}
			
			return true;
		}
		
	}
	
?>