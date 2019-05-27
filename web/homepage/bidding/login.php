<?php
require "helpers.php";
session_start();
$db = get_db();

if (!empty ($_POST['create']) {
	header("Location: https://vast-crag-32349.herokuapp.com/homepage/bidding/createAccount.php");
	die();	
}

if (!empty($_POST['username']) && !empty($_POST['password'])) {
	$loginID = login($_POST['username'], $_POST['password'], $db);
	if ($loginID != 0) {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['loginID'] = $loginID;
		header("Location: https://vast-crag-32349.herokuapp.com/homepage/bidding/storeFront.php");
		die(); 
	}
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
			}
		?>
	</div>

	<div class = "head" id = "head">
  		<h1><i>Store</i></h1>
	</div>

	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class = "sidebar">
		    <img src = "../week03/sidebar.jpg" alt = "sidebar" height = "100px" width = "100px">
		    <p>generic store goods</p>
		    <br><br>
		    <a href = "#top">back to top</a>
  		</div>

  		<div class = "center">
  			Username:
  			<input type = "text" name = "username"><br>
  			Password:
  			<input type = "text" name = "password"><br>
  			<input type = "submit" name = "login" value = "login">
  			<input type = "submit" name = "create" value = "create account">
  		</div>
	</form>
</body>
</html>