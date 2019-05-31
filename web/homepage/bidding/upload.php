<?php
require "helpers.php";
session_start();
$db = get_db();

$id = $_SESSION['loginID'];
$name = $_POST['name'];
$description = $_POST['description'];
$currentBid = floatval($_POST['startBid']);
$condition = $_POST['condition'];
$photoname = $_FILES["imageFile"]["name"];
$dateposted = date("m/d/Y");

//first upload the image to the server
$target_dir = "/homepage/bidding/";
$target_file = $target_dir . basename($_FILES['imageFile']['name']);
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["imageFile"]["tmp_name"]);
	if ($check !== false) {
		error_log("File is an image - " . $check["mime"] . ".");
		$uploadOK = 1;
	}
	else {
		error_log("File is not an image");
		$uploadOK = 0;
	}
}
if (!$uploadOK) {
	error_log("image was not uploaded");
} else {
	if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)) {
		error_log("The file " . basename($_FILES["imageFile"]["name"]) . " has been uploaded");
	} else {
		error_log("There was an error uploading the image");
		$uploadOK = 0;
	}
}

//if the upload was successful insert into database
if ($uploadOK) {
	$statement = $db->prepare("INSERT INTO itemsList (name, description, currentbid, currentbiduser, photoname, condition, owner, dateposted) VALUES ('$name','$description',$currentBid,$id,'$photoname','$condition',$id,'$dateposted')");
	$statement->execute();
	header("Location: https://vast-crag-32349.herokuapp.com/homepage/bidding/storeFront.php"); //will only redirect if insert is successful 
	die();
}

?>