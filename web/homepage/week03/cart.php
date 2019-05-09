<?php 

if (!empty($_POST['action']) && $_POST['action'] == 'checkout') {
  header("Location: https://vast-crag-32349.herokuapp.com/homepage/week03/checkout.php"); 
  die();
}
else if (!empty($_POST['action']) && $_POST['action'] == 'browse') {
  header("Location: https://vast-crag-32349.herokuapp.com/homepage/week03/store.php"); 
  die();
}

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

<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class = "sidebar">
		<img src = "sidebar.jpg" alt = "sidebar" height = "100px" width = "100px">
		<p>generic store goods</p>
		<p id = "total"><?php echo "total: " . $_SESSION["total"];?></p>
		<input type = "submit" name = "action" value = "checkout"><br>
		<input type = "submit" name = "action" value = "browse">
		<br><br>
		<a href = "#top">back to top</a>
	</div>

	<div class = "centered">
		<p>your items:</p>
		<?php
			foreach ($_SESSION as $item) {
				echo "<img src = \"$item\" alt = \"item\" height = \"100px\" width = \"100px\">";
			}
		?>
	</div>
</form>