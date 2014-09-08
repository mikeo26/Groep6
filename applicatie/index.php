<?php
require 'config/connect.php';
?>

<!doctype html>
<html>
    <head>
        <title>Barroc-IT</title>
        <link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.min.css"> 
        <link href="css/style.css" rel="stylesheet" type="text/css" >
    </head>
    <body>
    	<div class="container">
            <div class="header">
                <img src="images/header.jpg">
            </div>

            <div class="welcometext"> 
                <p>Welcome on <font color="#ff0000">B</font>arroc-IT. Please login to enter the webbapplication. </p>
            </div>

            <form action="session.php" method="POST" class="col-md-4 col-md-offset-4">        
            
            <legend>Login</legend>

            <?php
            if (isset($_GET['msg'])) 
            {
                echo '<p class="bg-warning">' . $_GET['msg'] . '</p>';
            }
            ?>
            <div class="form-group">         
                <label for= "username">username</label>
                <input type = "text" name="username"  class="form-control">
            </div>

            <div class="form-group">         
                <label for= "password">password</label>
                <input type = "password" name="password" class="form-control">
            </div>

            <div class="form-group">         
                <input type = "submit" value="inloggen" name="loginSubmit" class="btn btn-primary">
            </div>
        </form>
    </div>
    </body>
</html>