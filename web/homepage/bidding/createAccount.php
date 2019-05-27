<?php
require ("helpers.php");
session_start();
$db = get_db();

if (!empty($_POST['username']) && !empty($_POST['password'])) {
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$statement = $db->prepare("INSERT INTO public.user (username, password) VALUES ('$username', '$pass')");
	$statement->execute();
	header("Location: https://vast-crag-32349.herokuapp.com/homepage/bidding/login.php"); //if we get to this point then sql was successful 
	die();
}
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
			if ($_SESSION['loginID'] == NULL)
				echo "<a href=\"https://vast-crag-32349.herokuapp.com/homepage/week03/login.php\">login</a>";
			else if ($_SESSION['loginID'] != 0) {
				echo "<p>logged in as"; 
				echo $_SESSION['username'];
				echo "</p>  <a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/logout.php\">logout</a>";
				echo "<a href=\"https://vast-crag-32349.herokuapp.com/homepage/bidding/profile.php\">profile</a>";
			}
		?>
		<a href = "https://vast-crag-32349.herokuapp.com/homepage/bidding/storeFront.php">back to main page</a>
	</div>

	<div class = "head" id = "head">
  		<h1><i>Store</i></h1>
	</div>

	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class = "center">
			Please enter a username:
			<input type = "text" name = "username" required><br>
			Please enter a password:
			<input type = "password" name = "password" required><br>
			<input type = "submit" name = "createAccount" value = "create account"> 
		</div>
	</form>
</body>
</html>