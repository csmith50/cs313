<?php
require "helpers.php";
session_start();
$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>store</title>
	<link rel = "stylesheet" type = "text/css" href = "store.css">
	<meta charset = "UTF - 8">
</head>
<body>
	<div class = "loginText">
		<?php
			if ($_SESSION['loginID'] == NULL) {
				echo "<a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/login.php\">login</a> ";
        		echo "<a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/createAccount.php\">create account</a>";
			}
			else {
				echo "<p>logged in as "; 
				echo $_SESSION['username'];
				echo " </p><a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/logout.php\">logout</a>";
			}
		?>
		<a href = "https://vast-crag-32349.herokuapp.com/homepage/bidding/storeFront.php">back to main page</a>
	</div>

	<div class = "head" id = "head">
  		<h1><i>Store</i></h1>
	</div>

	<form method = "post" action = "https://vast-crag-32349.herokuapp.com/homepage/bidding/upload.php" enctype="multipart/form-data">
		<div class = "center">
			Select image to upload:
			<input type = "file" name = "imageFile" id = "imageFile" required><br>
			Type in a name:
			<input type = "text" name = "name" id = "name" required=""><br>
			Enter a description for your item:
			<input type = "text" name = "description" id = "description"><br>
			Enter a starting bid:
			<input type = "text" name = "startBid" id = "startBid"><br>
			Enter a condition for your item:<br>
			<input type = "radio" name = "condition" value = "New"> New <br>
			<input type = "radio" name = "condition" value = "Good"> Good <br>
			<input type = "radio" name = "condition" value = "Used"> Fair <br>
			<input type = "submit" name = "submit" value = "post item">
		</div>
	</form>
</body>
</html>