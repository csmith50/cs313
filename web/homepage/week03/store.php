<?php
session_start(); //is only run once

if (!empty($_POST['action']) && $_POST['action'] == 'checkout') {
  header("Location: https://vast-crag-32349.herokuapp.com/homepage/week03/checkout.php"); //add url later
  die();
}
else if (!empty($_POST['action']) && $_POST['action'] == 'view cart') {
  header("Location: https://vast-crag-32349.herokuapp.com/homepage/week03/cart.php") //add url later
  die();
}
else if (!empty($_POST['action']) && $_POST['action'] == 'add items') {
  if(!empty($_POST['shirt1'])) {
    array_push($_SESSION["items"], "shirt1.jpg");
    $_SESSION["total"] += 20.00;
  }
  else if (!empty($_POST['shirt2'])) {
    array_push($_SESSION["items"], "shirt2.jpg");
    $_SESSION["total"] += 20.00;
  }
  else if (!empty($_POST['pants1'])) {
    array_push($_SESSION["items"], "pants1.jpg");
    $_SESSION["total"] += 3500.00;
  }
  else if (!empty($_POST['pants2'])) {
    array_push($_SESSION["items"], "pants2.jpg");
    $_SESSION["total"] += 20.00;
  }
  else if (!empty($_POST['shoes1'])) {
    array_push($_SESSION["items"], "shoes1.jpg");
    $_SESSION["total"] += 20.00;
  }
  else if (!empty($_POST['shoes2'])) {
    array_push($_SESSION["items"], "shoes2.jpg");
    $_SESSION["total"] += 20.00;
  }
}

if (empty($_SESSION["total"]) && empty($_SESSION["items"])) {
  $_SESSION["total"] = 0.00;
  $_SESSION["items"] = array();
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

<body onreset = "resetting()">
<div class = "head" id = "head">
  <h1><i>Store</i></h1>
</div>

<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class = "sidebar">
    <img src = "sidebar.jpg" alt = "sidebar" height = "100px" width = "100px">
    <p>generic store goods</p>
    <p id = "total"><?php echo "total: " . $_SESSION["total"];?></p>
    <input type = "submit" name = "action" value = "view cart"><br>
    <input type = "submit" name = "action" value = "checkout"><br>
    <input type = "submit" name = "action" value = "add items">
    <br><br>
    <a href = "#top">back to top</a>
  </div>

  <div class = "itemLeft">
    <img src = "shirt1.jpg" alt = "shirt 1" height = "200px" width = "200px">
    <p>$20.00</p>
    <input type = "checkbox" name = "shirt1" value = "shirt1">
  </div>
  <div class = "itemRight">
    <img src = "shirt2.jpg" alt = "shirt 2" height = "200px" width = "200px">
    <p>$20.00</p>
    <input type = "checkbox" name = "shirt2" value = "shirt2">
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div class = "itemLeft">
    <img src = "pants1.jpg" alt = "pants 1" height = "200px" width = "200px">
    <p>$3500.00</p>
    <input type = "checkbox" name = "pants1" value = "pants1">
  </div>
  <div class = "itemRight">
    <img src = "pants2.jpg" alt = "pants 2" height = "200px" width = "200px">
    <p>$20.00</p>
    <input type = "checkbox" name = "pants2" value = "pants2">
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div class = "itemLeft">
    <img src = "shoe1.jpg" alt = "shoes 1" height = "200px" width = "200px">
    <p>$20.00</p>
    <input type = "checkbox" name = "shoes1" value = "shoes1">
    <hr>
  </div>
  <div class = "itemRight">
    <img src = "shoe2.jpg" alt = "shoes 2" height = "200px" width = "200px">
    <p>$20.00</p>
    <input type = "checkbox" name = "shoes2" value = "shoes2">
    <hr>
  </div>
  <br><Br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</form>

</body>

</html>
