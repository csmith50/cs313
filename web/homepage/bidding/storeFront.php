<?php
require "helpers.php"; 
session_start();

if (empty($_SESSION['loginID']))
	$_SESSION['loginID'] = NULL;

if (empty($_SESSION['db']))
	$_SESSION['db'] = get_db();

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
				echo "<a href=\"https://vast-crag-32349.herokuapp.com/homepage/week03/login.php\">login</a>";
			}
			else {
				echo "<p>logged in as $_SESSION['username']</p>  <a href=\"https://vast-crag-32349.herokuapp.com/homepage/week03/logout.php\">logout</a>";
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


	</form>

</body>
</html>