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
	<br><br>
	<a href = "store.php">back to browse</a>
	<br><br>
	<a href = "#top">back to top</a>
</div>

<div class = "center">
	<p>your items:</p>
	<?php
		foreach ((array) $_SESSION["items"] as $item) {
			echo "<img src = " . $item . " alt = \"item\" height = \"100px\" width = \"100px\">";
		}
		session_destroy(); //we don't need session variables after this
	?>
	<p>sent to this address:</p>
	<?php
		echo htmlspecialchars($_POST[address]);
		echo "<br>";
		echo htmlspecialchars($_POST[city]) . ", " . htmlspecialchars($_POST[state]) . ", " . htmlspecialchars($_POST[zip]);
	?>
</div>
</body>
</html>