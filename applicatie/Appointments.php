<?php
require 'config/connect.php';
error_reporting(E_ALL);

/*Get details from tabel appointments */
if (!$query = mysqli_query($con, "SELECT * FROM appointments ORDER BY id DESC")) 
{
    echo "kan de gegevens niet uit de database halen";
    die();
}

if (isset($_GET['del'])) 
{
    $id = $_GET['del'];
    $query = mysqli_query($con, "DELETE FROM appointments WHERE id = $id");
    echo "Data succesvol verwijderd";
    header('location:appointments.php');    
}
?>
<!doctype html>
<html>
    <head>
        <title>Barroc-IT</title>
         <link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
    </head>
    <body>
    	<div class="container">
    		<div class="page-heading">
    			<h1>Appointments</h1>
    		</div>
		    <table class="table table-striped">
		        <thead>
    		        <tr>
    		        	<td class="col-sm-2"><strong>CustomerName</strong></td>
    		        	<td class="col-sm-2"><strong>CompanyName</strong></td>        
    		        	<td class="col-sm-2"><strong>Date</strong></td>
    		        	<td class="col-sm-2"><strong>Who</strong></td>
    		        	<td class="col-sm-2"><strong>Time</strong></td>        
    		        	<td class="col-sm-2"><strong>Place</strong></td>
    		        </tr>
    		    </thead>
    		    <tbody>    		    	
    		    <?php
    		    	/*hier komt de while loop om alles te displayen*/
    		    while ($row = mysqli_fetch_assoc($query)) 
    		    {
	   		    	echo '<tr>';
    		    	echo '<td>' . $row['CustomerName'] . '</td>';
    		    	echo '<td>' . $row['CompanyName'] . '</td>';
    		    	echo '<td>' . $row['Date'] . '</td>';
    		    	echo '<td>' . $row['Who'] . '</td>';
                    echo '<td>' . $row['Time'] . '</td>';
                    echo '<td>' . $row['Place'] . '</td>';
    		    	echo '<td> <a href="edit.php?id=' . $row['id'] . '"</a> EDIT </td>';
    		    	echo '<td> <a href="appointments.php?del=' . $row['id'] . '"</a> Delete </td>';
    		    	echo '</tr>';
    		    }
    		    ?>
    		    </tbody>
    		</table>
    	</div>
    </body>
</html>