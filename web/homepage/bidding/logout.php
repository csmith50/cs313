<?php 
session_start();
$_SESSION['loginID'] = NULL;
$_SESSION['username'] = NULL;
session_destroy();
header("Location: https://vast-crag-32349.herokuapp.com/homepage/bidding/storeFront.php");
die();
?>