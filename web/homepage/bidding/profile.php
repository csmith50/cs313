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
				echo "</p><a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/logout.php\">logout</a>";
				echo "<a href = \"https://vast-crag-32349.herokuapp.com/homepage/bidding/addItem.php\">post an item</a>";
			}
		?>
		<a href = "https://vast-crag-32349.herokuapp.com/homepage/bidding/storeFront.php">back to main page</a>
	</div>

	<div class = "head" id = "head">
  		<h1><i>Store</i></h1>
	</div>


	<div class = "center">
		<?php
			if (!empty($_GET['id']) && $_GET['id'] == $_SESSION['loginID']) {
          			echo "<a href = \"https://vast-crag-32349.herokuapp.com/homepage/bidding/editProfile.php\">edit profile</a>";
          		}

			if (!empty($_GET['id']) && $_GET['id'] == $_SESSION['loginID'])
				$login = $_SESSION['loginID'];
			else if (!empty($_GET['id']) && $_GET['id'] != $_SESSION['loginID'])
				$login = $_GET['id'];
			else
				$login = $_SESSION['loginID'];

			$statement = $db->prepare("SELECT username, description FROM public.user WHERE id = $login");
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			$username = $row['username'];
			$desc = $row['description'];
			echo "<h1>$username</h1><br>";
			echo "<p>$desc</p><br>";

			$db = get_db();
			$statement = $db->prepare("SELECT  id, name, photoname FROM itemsList WHERE owner = $login");
			$statement->execute();
			echo "<h3>items this user is selling</h3><br>";
			echo "</div>";

			$isLeft = true;
			foreach ($statement as $row) {
  				$name = $row['name'];
  				$photoName = $row['photoname'];
  				$id = $row['id'];

  				if ($isLeft) 
  					echo "<div class = \"itemLeft\">";
  				else 
  					echo "<div class = \"itemRight\">";

  				echo "<img src = \"";
          		echo $photoName;
          		echo "\" height = \"200px\" width = \"200px\" alt = \"missing photo\">";
  				echo "<a href = \"https://vast-crag-32349.herokuapp.com/homepage/bidding/itemPage.php?name=$name&photoName=$photoName&id=$id\">$name</a>";
  				echo "</div>";

          		if (!$isLeft)
            		echo "<br><Br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>"; //line break on right item
          		$isLeft = !$isLeft;
  			}
		?>
	<!--</div>-->
</body>
</html>