<?php

require_once("functions.inc.php");
redirectIfNotLoggedIn();

?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="./assets/home.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <style>
.column {
  float: left;
  width: 30.0%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.contact-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}





.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
p{
    font-size:10px;
}
@media screen and (max-width: 650px) {
  .column {
    width: 80%;
    display: block;
  }
}
            </style>
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
        
        <div class="contact-section">
  <h1>Contact Us Page</h1>
  <p>Some text about who we are and what we do.</p>
  <p>Resize the browser window to see that this page is responsive by the way.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="./assets/img/team.webp" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Dhairya</h2>
        <p class="title">CEO & Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jane@example.com</p>
  
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="./assets/img/team.webp" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Bini</h2>
        <p class="title">Art Director</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>mike@example.com</p>
      
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="./assets/img/team.webp" alt="John" style="width:100%">
      <div class="container">
        <h2>Iffe</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>john@example.com</p>
      
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="./assets/img/team.webp" alt="John" style="width:100%">
      <div class="container">
        <h2>Savan</h2>
        <p class="title">Designer</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>john@example.com</p>
      
      </div>
    </div>
  </div>
</div>


    
    </body>
</html>

