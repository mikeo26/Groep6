<?php
require '../config/connect.php';
error_reporting(E_ALL);

session_start();


if (! isset($_SESSION['username']) ) 
{
    $msg = urlencode('u moet ingelogd zijn om op deze pagina te komen.');
    header('location: login.php?msg=' . $msg);
}

if (isset($_GET['id'])) 
{
	$id = $_GET['id'];
	$query = "SELECT * FROM projects WHERE id = $id";
	if (!$query = mysqli_query($con, $query)) 
	{
		echo "kan de code niet uitvoeren";	
	}
}
else
{
	//header('location: index.php');
	echo "data succesvol bijgewerkt";
}

if (isset($_POST['submit']) && !empty($_POST['CustomerName']))
{
	$CustomerName = mysqli_real_escape_string($con, $_POST['CustomerName']);
	$CompanyName = mysqli_real_escape_string($con, $_POST['CompanyName']);
	$ProjectNumber = mysqli_real_escape_string($con, $_POST['ProjectNumber']);
	$ProjectLenght = mysqli_real_escape_string($con, $_POST['ProjectLenght']);
	$ProjectLeader = mysqli_real_escape_string($con, $_POST['ProjectLeader']);
	$Proceedings = mysqli_real_escape_string($con, $_POST['Proceedings']);

	if (!$query = mysqli_query($con, "UPDATE projects SET CustomerName = '$CustomerName', CompanyName = '$CompanyName', ProjectNumber = '$ProjectNumber', ProjectLenght = '$ProjectLenght', ProjectLeader = '$ProjectLeader', Proceedings = '$Proceedings' WHERE id = '$id'")); 
	{
		echo 'Data succesvol bijgewerkt!';
		//header('location: index.php');
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
                <h1><font color="#ff0000">B</font>arroc-IT <font color="#ff0000">D</font>evelopment-Panel</h1>
            </div>

            <div class="logout">
                <a href="logout.php">Logout</a>
            </div>            

            <div class="admin-block-left">
                <a href="index.php">Home</a>
                <br>
                <a href="projects.php">Manage Projects</a>
                <br>
                <a href="cancelled.php">Cancelled Projects</a>
            </div>

            	<div class="view-project">
            		<?php
   						if ($row = mysqli_fetch_assoc($query)) 
			   			{   			
			   			?>	            
						<form action="#" method="POST">
						<LEGEND>Project Details</LEGEND>
							<div class="form-group col-sm-6">
								<label for="CustomerName">CustomerName</label>
								<input value="<?php echo $row['CustomerName']; ?>" type="text" class="form-control" name="Customername" id="Customername">				
							</div>

							<div class="form-group col-sm-6">
								<label for="CompanyName">CompanyName</label>
								<input value="<?php echo $row['CompanyName']; ?>" type="text" class="form-control" name="CompanyName" id="CompanyName">			
							</div>

							<div class="form-group col-sm-6">
								<label for="ProjectNumber">ProjectNumber</label>
								<input value="<?php echo $row['ProjectNumber']; ?>" type="text" class="form-control" name="ProjectNumber" id="ProjectNumber">				
							</div>

							<div class="form-group col-sm-6">
								<label for="ProjectLenght">ProjectLenght</label>
								<input value="<?php echo $row['ProjectLenght']; ?>" type="text" class="form-control" name="ProjectLenght" id="ProjectLenght">
							</div>

							<div class="form-group col-sm-6">
								<label for="ProjectLeader">ProjectLeader</label>
								<input value="<?php echo $row['ProjectLeader']; ?>" type="text" class="form-control" name="ProjectLeader" id="ProjectLeader">			
							</div>

							<div class="form-group col-sm-6">
								<label for="Proceedings">Proceedings</label>
								<input value="<?php echo $row['Proceedings']; ?>" type="text" class="form-control" name="Proceedings" id="Proceedings">				
							</div>

							<div class="form-group col-sm-12">
								<input name="submit" type="submit" value="Bewerk" class="btn btn-primary">					
							</div>			
				    	</form>
			    	<?php	    	
			    	}
			    	?>
			    </div>
        </div>
    </body>
</html>