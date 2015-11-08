<?php 
	
    include('components/header.php');
    include('components/navbar.php');
    
    switch($_GET['p']){
    	case "home":
    		include("pages/home.php");
    	break;
    	case "login":
    		include("pages/login.php");
    	break;
    	case "signup":
    		include("pages/signup.php");
    	break;
    	case "dashboard":
    		include("pages/dashboard.php");
    	break;
    	case "group":
    		include("pages/group.php");
    	break;
    	case "newgroup":
    		include("pages/newgroup.php");
    	break;
    	case "logout":
    		include("pages/logout.php");
    	break;
    	default:
    		include("pages/home.php");
    	break;
    }
    
    include("components/footer.php");
    include("components/endScripts.php");
?>