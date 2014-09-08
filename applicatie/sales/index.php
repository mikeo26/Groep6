<?php

session_start();
require '../config/connect.php';

if (!isset($_SESSION['username']) ) 
{
    $msg = urlencode('u moet ingelogd zijn om op deze pagina te komen.');
    header('location: login.php?msg=' . $msg);
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
                <h1><font color="#ff0000">B</font>arroc-IT <font color="#ff0000">S</font>ales-Panel</h1>
            </div>

    		<div class="logout">
    			<a href="logout.php">Logout</a>
    		</div>

            <div class="admin-block-left">
                <a href="index.php">Home</a>
                <br>
                <a href="Create-customer.php">Create Customer</a>
                <br>
                <a href="manage-customers.php">Manage Customers</a>
                <br>
                <a href="manage-projects.php">Manage Projects</a>
                <br>
                <a href="deactivate-customers.php">Deactivate customers</a>
            </div>
    </div>    	
    </body>
</html>