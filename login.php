<?php 
    include('components/header.php');
    include('components/navbar.php');
?>

<a  name="login-form"></a>
<div class="content-section-a">
    <div class="container">
     <div class="row">
      <div class="col-lg-5 col-sm-6">
        <h2 class="section-heading">Log In</h2>
        <form role="form" action="backend/login.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="username" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
               <label for="password">Password:</label>
             <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
           </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
     </div>
    </div>
</div>

</body>

</html>