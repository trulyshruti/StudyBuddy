<?php
    
?>

 </head>

 <body>

<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="./">StudyBuddy</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <!-- BEGIN DEFAULT NAVBAR --
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                    -- END DEFAULT NAVBAR -->
                    <?php 
                    	
                    	session_start();
						if($_SESSION['username'] == ""){
							echo "
									
									<li>
				                        <a href='?p=login'>Log In</a>
				                    </li>
				                    <li>
				                        <a href='?p=signup'>Sign Up</a>
				                    </li>

								 ";
						} else{
							echo "
									
									<li>
				                        <a href='?p=myaccount'>Hi, ".$_SESSION['fname']."</a>
				                    </li>
				                    <li>
				                        <a href='?p=logout'>Logout</a>
				                    </li>
				                    
				                    ";
						}
                    	
                    ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>