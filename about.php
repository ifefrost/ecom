<?php

require_once("functions.inc.php");
redirectIfNotLoggedIn();

?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="./assets/home.css">
</head>
    <body class="container">
    <nav>
        <ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="products.php">Product</a></li>
  <li><a href="contacts.php">Contact</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
        </nav>
 <div class="container">
    <h1>About</h1>
 </div>
    
    </body>
</html>

