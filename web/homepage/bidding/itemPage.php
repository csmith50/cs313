<?php
require "helpers.php";
session_start();
$db = get_db();


?>
<!DOCTYPE HTML>
<html>
<head>
	<title>store</title>
	<link rel = "stylesheet" type = "text/css" href = "store.css">
	<meta charset = "UTF-8">
</head>
<body>
	<div class = "loginText">
		<?php
			if ($_SESSION['loginID'] == NULL) {
				echo "<a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/login.php\">login</a>";
			}
			else {
				echo "<p>logged in as "; 
				echo $_SESSION['username'];
				echo "</p><a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/logout.php\">logout</a>";
			}
		?>
	</div>

	<div class = "head" id = "head">
  		<h1><i>Store</i></h1>
	</div>

	<div class = "itemContent">
		<?php
			$id = $_GET['id'];
			$name = $_GET['name'];
			$photoName = $_GET['photoname'];
			$statement = $db->prepare("SELECT description, currentbid, currentbiduser FROM itemsList WHERE id = $id");
        	$statement->execute();
        	$row = $statement->fetch(PDO::FETCH_ASSOC);
        	$description = $row['description'];
			echo "<p><img src = \"$photoname\" style = \"padding: 0 15px; float: left;\" height = \"500px\" width = \"500px\"></p>";
			echo "<p>$name</p>";
			echo "<p>Current Bid: $";
			echo $row['currentbid'];

			$bidUser = makeQuery("user", $db, $row['currentbiduser']);
			$row = $bidUser->fetch(PDO::FETCH_ASSOC);
			$username = $row['username'];
			echo "by $username</p>";

			echo "<br><p>$description</p>";
		?>
	</div>
</body>
</html>