<?php

require 'config/connect.php';
error_reporting(E_ALL);

if (isset($_GET['id'])) 
{
	$id = $_GET['id'];
	$query = "SELECT * FROM appointments WHERE id = $id";
	if (!$query = mysqli_query($con, $query)) 
	{
		echo "kan de code niet uitvoeren";	
	}
}
else
{
	header('location: appointments.php');
	echo "data succesvol bijgewerkt";
}


if (isset($_POST['submit']) && !empty($_POST['CustomerName']))
{
	$CustomerName = mysqli_real_escape_string($con, $_POST['CustomerName']);
	$CompanyName = mysqli_real_escape_string($con, $_POST['CompanyName']);
	$Date = mysqli_real_escape_string($con, $_POST['Date']);
	$Who = mysqli_real_escape_string($con, $_POST['Who']);
	$Time = mysqli_real_escape_string($con, $_POST['Time']);
	$Place = mysqli_real_escape_string($con, $_POST['Place']);

	if (!$query = mysqli_query($con, "UPDATE appointments SET CustomerName = '$CustomerName', CompanyName = '$CompanyName', Date = '$Date', Who = '$Who', Time = '$Time', Place = '$Place'  WHERE id = '$id'")); 
	{
		echo 'Data succesvol bijgewerkt!';
		header('location: appointments.php');
	}
}
?>		
<!DOCTYPE html>
<html>
<head>
	<title>Edit page</title>
	<link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.min.css"> 
</head>
	<body>
		<div class="container">
  			<div class="page-header">
    			<h1>Edit</h1>
   			</div>

   			<?php
   			if ($row = mysqli_fetch_assoc($query)) 
   			{   			
   			?>	            
			<form action="#" method="POST">
				<div class="form-group col-sm-6">
					<label for="CustomerName">CustomerName</label>
					<input value="<?php echo $row['CustomerName']; ?>" type="text" class="form-control" name="CustomerName" id="CustomerName">				
				</div>

				<div class="form-group col-sm-6">
					<label for="CompanyName">CompanyName</label>
					<input value="<?php echo $row['CompanyName']; ?>" type="text" class="form-control" name="CompanyName" id="CompanyName">			
				</div>

				<div class="form-group col-sm-6">
					<label for="Date">Date</label>
					<input value="<?php echo $row['Date']; ?>" type="text" class="form-control" name="Date" id="Date">				
				</div>

				<div class="form-group col-sm-6">
					<label for="Who">Who</label>
					<input value="<?php echo $row['Who']; ?>" type="text" class="form-control" name="Who" id="Who">
				</div>	

				<div class="form-group col-sm-6">
					<label for="Time">Time</label>
					<input value="<?php echo $row['Time']; ?>" type="text" class="form-control" name="Time" id="Time">
				</div>

				<div class="form-group col-sm-6">
					<label for="Place">Place</label>
					<input value="<?php echo $row['Place']; ?>" type="text" class="form-control" name="Place" 
					id="Place">
				</div>

				<div class="form-group col-sm-12">
					<input name="submit" type="submit" value="Bewerk" class="btn btn-primary">					
				</div>			
	    	</form>
	    	<?php	    	
	    	}
	    	?>	    			
	    </div>
	</body>
</html>