<?php

require 'config/connect.php';

$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password = '$password'") or die(mysqli_error());
$row = mysqli_num_rows($query);

if (isset($_POST['loginSubmit'])) 
{  

    $queryFetch = mysqli_fetch_array($query);
    session_start();
    $_SESSION['username'] = $queryFetch['username'];
    $_SESSION['role'] = 'user';

    switch($_SESSION['username'])
    {
        case "finance":
        header ('location: financien');
        break;

        case "sales":
        header ('location: sales');
        break;

        case "development":
        header ('location: development');
        break;

        case "admin":
        header ('location: administrator');
        break;
    }


/*   else
    {
        echo 'verkeerde gebruikersnaam of wachtwoord!, probeer het nog eens';
        header('location: index.php?msg=' . $msg);
    }*/
}
    else
    {
        $msg = urlencode('U kunt deze pagina niet bekijken.');
       // header('location: administrator?msg=' . $msg);
    }
?>	