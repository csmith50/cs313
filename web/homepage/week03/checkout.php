<?php 
session_start();
?>
<!DOCTYPE html>
<html lang = "en">
<head>
  <title>Store Front</title>
  <meta charset = "UTF - 8">
  <link rel = "stylesheet" type = "text/css" href = "store.css">
  <script src = "store.js"></script>
</head>

<body>
<div class = "head" id = "head">
  <h1><i>Store</i></h1>
</div>

<div class = "sidebar">
	<img src = "sidebar.jpg" alt = "sidebar" height = "100px" width = "100px">
	<p>generic store goods</p>
	<p id = "total"><?php echo "total: " . $_SESSION["total"];?></p>
	<br><br>
	<a href = "store.php">back to browse</a>
	<a href = "#top">back to top</a>
</div>

<div class = "center">
	<form method = "post" action = "confirm.php">
		<p>please enter your full address</p><br><br>
		<p>street address:</p>
		<input type = "text" name = "address" placeholder="123 south hampton street"><br><br>
		<p>city:</p>
		<input type = "text" name = "city" placeholder="louisville"><br><br>
		<p>state:</p>
		<input type = "text" name = "state" placeholder="KY"><br><br>
		<p>zip code:</p>
		<input type = "text" name = "zip" placeholder="76453"><br><br><br><br>
		<input type = "submit" name = "action" value = "confirm">
	</form>
</div>
</body>
</html>