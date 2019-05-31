<?php
require "helpers.php";
session_start();
$db = get_db();
$id = $_SESSION['loginID'];

$statement = $db->prepare("SELECT id, username, description, paymentInfoID FROM public.user WHERE id = $id");
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
$currentusername = $row['username'];
$currentdesc = $row['description'];
$currentpass = $row['password'];

if (!empty($_POST['username']) && $_POST['username'] != $currentusername) {
	$newuser = $_POST['username'];
	$statement = $db->prepare("UPDATE public.user SET username = '$newuser' WHERE id = $id");
	$statement->execute();
}
if (!empty($_POST['password']) && $_POST['password'] != $currentpass) {
	$newpass = $_POST['password'];
	$statement = $db->prepare("UPDATE public.user SET password = '$newpass' WHERE id = $id");
	$statement->execute();
}
if (!empty($_POST['description']) && $_POST['description'] != $currentdesc) {
	$newdesc = $_POST['description'];
	$statement = $db->prepare("UPDATE public.user SET description = '$newdesc' WHERE id = $id");
	$statement->execute();
	//at this point we are ready to exit the page
	header("Location: https://vast-crag-32349.herokuapp.com/homepage/bidding/storeFront.php");
	die();
}

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
				echo "</p><a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/logout.php\">logout </a>";
        		echo "<a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/profile.php\">profile</a>";
        		echo "<a href = \"https://vast-crag-32349.herokuapp.com/homepage/bidding/addItem.php\">post an item</a>";
			}
		?>
	</div>

	<div class = "head" id = "head">
  		<h1><i>Store</i></h1>
	</div>

	<form method = "post" action = "">
		<div class = "center">
			<?php
				echo "Username: <input type = \"text\" name = \"username\" value = \"$currentusername\"><br>";
				echo "Password: <input type = \"password\" name = \"password\"><br>";
				echo "Description: <input type = \"textarea\" name = \"description\" value = \"$currentdesc\" rows = \"5\" cols = \"50\"><br>";
				echo "<input type = \"submit\" name = \"edit\" value = \"submit changes\">";
			?>
		</div>
	</form>
</body>
</html>