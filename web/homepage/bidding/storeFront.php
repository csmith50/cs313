<?php
require "helpers.php"; 
session_start();

if (empty($_SESSION['loginID']))
	$_SESSION['loginID'] = NULL;

$db = get_db();

?>

<!DOCTYPE html>
<html>
<head>
	<title>store</title>
	<meta charset = "UTF - 8">
  	<link rel = "stylesheet" type = "text/css" href = "store.css">
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

	<form method = "post" action = "">
		<div class = "sidebar">
		    <img src = "../week03/sidebar.jpg" alt = "sidebar" height = "100px" width = "100px">
		    <p>generic store goods</p>
		    <br><br>
		    <a href = "#top">back to top</a>
  		</div>
  		<?php
  			$isLeft = true;
  			$itemList = makeQuery("itemsList", $db); #get the entire itemsList
        alert('Got whole itemsList');
        alert($itemsList);

  			while ($row = $itemsList->fetch(PDO::FETCH_ASSOC)) {
          alert('entered loop');
  				$name = $row['name'];
  				$currentBid = $row['currentBid'];
  				$description = $row['description'];
  				$currentBidUser = $row['currentBidUser'];
  				$photoName = $row['photoName'];
  				$condition = $row['condition'];
  				$datePosted = $row['datePosted'];
          alert('variables assigned');

  				if ($isLeft) 
  					echo "<div class = \"itemLeft\">";
  				else 
  					echo "<div class = \"itemRight\">";
  				$isLeft = !$isLeft;
          alert('div statement said');

  				echo "<img src = \"$photoName\" height = \"200px\" width = \"200px\" alt = \"missing photo\">";
  				echo "<a href = \"https://vast-crag-32349.herokuapp.com/homepage/bidding/itemPage.php?name=$name&currentBid=$currentBid&description=$description&currentBidUser=$currentBidUser&photoName=$photoName&condition=$condition&datePosted=$datePosted\">$name</a>";
  				echo "</div>";
          alert('items posted');
  			}
  		?>
  		<br><Br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</form>
</body>
</html>