<?php

session_start();
require '../config/connect.php';

if (! isset($_SESSION['username']) ) 
{
    $msg = urlencode('u moet ingelogd zijn om op deze pagina te komen.');
    header('location: login.php?msg=' . $msg);
}




if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) 
{
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$department = mysqli_real_escape_string($con, $_POST['department']);

	if (!$query = mysqli_query($con, "INSERT INTO users (username, password, department) 
									  VALUES ('$username', '$password', '$department')"));

	{
		echo "Your user has succesfull added";
		header('location: index.php');
	}
}


public function check($password-check)
{
	if ($_POST['password'] && $_POST['password-check']) 
	{
		
	}
}


?>
<!doctype html>
<html>
    <head>
        <title>Barroc-IT</title>
        <link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.min.css"> 
        <link href="../css/style.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
    	<div class="container">

            <div class="header">
                <img src="../images/header.jpg">

                    <div class="header-details">
                        <?php echo 'Logged in as: ' . $_SESSION['username'];?> 
                    </div>
            </div>        

            <div class="page-heading">
                <h1><font color="#ff0000">B</font>arroc-IT <font color="#ff0000">A</font>ministrator-Panel</h1>
            </div>

    		<div class="logout">
    			<a href="logout.php">Logout</a>
    		</div>

            <div class="admin-block-left">
               <a href="index.php">Home</a>
               <br>
               <a href="register.php">Register</a>
               <br>
               <a href="user-info.php">User Information</a>
               <br>
               <a href="deactivate-users.php">Deactivated Users</a> 
            </div>

        	<form action="#" method="POST">
				<LEGEND>Register a new user</LEGEND>
				<div class="form-group col-sm-8">
					<label for="username">Username</label>
					<input type="text" class="form-control" cols='30' name="username" id="username">				
				</div>

				<div class="form-group col-sm-8">
					<label for="Password">Password</label>
					<input type="password" class="form-control" name="password" id="password">			
				</div>

				<div class="form-group col-sm-8">
					<label for="password-check">Repeat Password</label>
					<input type="password" class="form-control" name="password-check" id="password-check">				
				</div>

				<div class="form-group col-sm-8">
					<label for="department">Department</label>
					<select>
  						<option value="Administrator">Administrator</option>
						<option value="Finance">Finance</option>
						<option value="Sales">Sales</option>
						<option value="Development">Development</option>
					</select>
				</div>	

				<div class="form-group col-sm-12">
					<input name="submit" type="submit" value="Add-user" class="btn btn-primary">					
				</div>
			</form>            		
    	</div>    	
    </body>
</html>