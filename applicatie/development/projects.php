
<?php

session_start();
require '../config/connect.php';

if (! isset($_SESSION['username']) ) 
{
    $msg = urlencode('u moet ingelogd zijn om op deze pagina te komen.');
    header('location: login.php?msg=' . $msg);
}

if (!$query = mysqli_query($con, "SELECT * FROM projects ORDER BY id DESC")) 
{
    echo "kan de gegevens niet uit de database halen";
    die();
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

            <div class="project-table">

                <table class="table table-striped">
                <thead>
                    <tr>
                        <td class="col-sm-2"><strong>CustomerName</strong></td>
                        <td class="col-sm-2"><strong>CompanyName</strong></td>        
                        <td class="col-sm-2"><strong>ProjectNumber</strong></td>
                        <td class="col-sm-2"><strong>ProjectLenght</strong></td>
                        <td class="col-sm-2"><strong>ProjectLeader</strong></td>        
                        <td class="col-sm-2"><strong>Proceedings</strong></td>
                        <td class="col-sm-2"><strong>View Project</strong></td>
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
                    echo '<td>' . $row['ProjectNumber'] . '</td>';
                    echo '<td>' . $row['ProjectLenght'] . '</td>';
                    echo '<td>' . $row['ProjectLeader'] . '</td>';
                    echo '<td>' . $row['Proceedings'] . '</td>';
                    echo '<td> <a href="view-project.php?id=' . $row['id'] . '"</a> View </td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>      
    </body>
</html>