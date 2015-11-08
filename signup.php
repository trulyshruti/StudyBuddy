<?php 
    include('components/header.php');
    include('components/navbar.php');
?>

<a  name="login-form"></a>
<div class="content-section-a">
    <div class="container">
     <div class="row">
      <div class="col-lg-5 col-sm-6">
        <h2 class="section-heading">Sign Up</h2>
        <form role="form" action="backend/signup.php" method="post">
            <div class="form-group">
               <label for="first_name">First Name:</label>
             <input type="first_name" class="form-control" id="first_name" name="first_name">
            </div>
            <div class="form-group">
               <label for="last_name">Last Name:</label>
             <input type="last_name" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="form-group">
               <label for="email">Email:</label>
             <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="username" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
               <label for="password">Password:</label>
             <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
     </div>
    </div>
</div>

</body>

</html>