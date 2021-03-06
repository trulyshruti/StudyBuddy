<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>StudyBuddy</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand topnav" href="#">StudyBuddy</a>
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
                    <li>
                        <a href="#login">Log In</a>
                    </li>
                    <li>
                        <a href="#signup">Sign Up</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<a  name="login-form"></a>
<div class="content-section-a">
    <div class="container">
     <div class="row">
      <div class="col-lg-5 col-sm-6">
        <h2 class="section-heading">FORM NAME</h2>
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

</body>

</html>