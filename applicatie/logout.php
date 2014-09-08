<?php

session_start();
session_destroy();

$msg = rawurlencode('u bent succesvol uitgelogd');
header('location: ../index.php' . $msg);

?>