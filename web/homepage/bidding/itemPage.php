<?php
require "helpers.php";
session_start();
$db = get_db();

if ($_SESSION['loginID'] != NULL && !empty($_POST['bidValue'])) {
	$value = floatval($_POST['bidValue']);
	$pastBidUser = $_POST['cbu'];
	$newBidUser = $_SESSION['loginID'];
	$statement = $db->prepare("UPDATE itemsList SET currentbid = $value, currentbiduser = $newBidUser WHERE currentbiduser = $pastBidUser");
	$statement->execute();
	header("Location: https://vast-crag-32349.herokuapp.com/homepage/bidding/storeFront.php");
	die();
}
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
				echo "<a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/login.php\">login</a> ";
				echo "<a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/createAccount.php\">create account</a>";
			}
			else {
				echo "<p>logged in as "; 
				echo $_SESSION['username'];
				echo "</p><a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/logout.php\">logout </a>";
				echo "<a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/profile.php\">profile</a>";
			}
		?>
		<a href = "https://vast-crag-32349.herokuapp.com/homepage/bidding/storeFront.php">back to main page</a>
	</div>

	<div class = "head" id = "head">
  		<h1><i>Store</i></h1>
	</div>

	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class = "itemContent">
			<?php
				$id = $_GET['id'];
				$name = $_GET['name'];
				$photoName = $_GET['photoname'];
				$statement = $db->prepare("SELECT description, currentbid, currentbiduser, owner FROM itemsList WHERE id = $id");
	        	$statement->execute();
	        	$row = $statement->fetch(PDO::FETCH_ASSOC);
	        	$description = $row['description'];
	        	$cbu = $row['currentbiduser'];
				echo "<p><img src = \"$photoName\" style = \"padding: 0 15px; float: left;\" height = \"500px\" width = \"500px\"></p>";
				echo "<p>$name</p>";
				echo "<p>Current Bid: $";
				echo $row['currentbid'];

				$owner = $row['owner'];

				$bidUser = makeQuery("user", $db, $row['currentbiduser']);
				$row = $bidUser->fetch(PDO::FETCH_ASSOC);
				$username = $row['username'];
				$bidUserID = $row['id'];
				echo " by ";
				echo "<a href = \"https://vast-crag-32349.herokuapp.com/homepage/bidding/profile.php?id=$bidUserID\">$username</a></p>";

				$OGuser = makeQuery("user", $db, $owner);
				$row = $OGuser->fetch(PDO::FETCH_ASSOC);
				$Ousername = $row['username'];
				echo "<p>Item posted by: ";
				echo "<a href = \"https://vast-crag-32349.herokuapp.com/homepage/bidding/profile.php?id=$owner\">$Ousername</a></p>";

				if ($_SESSION['loginID'] != NULL) {
					echo "<input type = \"hidden\" name = \"cbu\" value = \"$cbu\">";
					echo "<p>Your bid:</p><input type = \"text\" name = \"bidValue\"><input type = \"submit\" name = \"newBid\" value = \"bid\">";
				}

				echo "<br><p>$description</p>";
			?>
		</div>
	</form>
</body>
</html>