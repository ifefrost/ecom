<?php

require_once("./db/functions.inc.php");
redirectIfNotLoggedIn();

?>
<!doctype html>
<html>
<?php pageheader('About') ?>
       <style>
  
.about-content{
  margin:1rem;
  width: 96;
  letter-spacing: 2px;
  font-family: sans-serif;
    font-size: 1.1em;
}
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

.about-section {
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
    <body class="container">

    <!-- <h1>About</h1> -->
 
 <div class="about-section">
  <h1>About Us</h1>
  <p>Unlimited fast, FREE Shiping for everyone on your business account and more business benefits</p>
</div>
<br>
<div>
<p class="about-content">
 Founded in 2007, MUO has grown into one of the largest online technology publications on the web.
 Our expertise in all things tech has resulted in millions of visitors every month and hundreds of thousands of fans on social media.
 We believe that technology is only as useful as the one who uses it.
 Our aim is to equip readers like you with the know-how to make 
 the most of today's tech, explained in simple terms that anyone can understand. 
 We also encourage readers to use tech in productive and meaningful ways.
</p>
<p class="about-content"> 
We're tech enthusiasts on a mission to teach the world how to use and understand the tech in their lives.
 Phones, laptops, gadgets, apps, software, websites,services. 
 if it can make your life better, we'll show you all the tips,tricks, and techniques you need to know to get the most out of what you have.
</p>
</div>

<h2 style="text-align:center">Our Branches</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="./assets/img/team.webp" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Ecom</h2>
        <p class="title">Gulph</p>
        <p>Variety of Electronic Gadgets available here</p>
        <p><a href = "mailto: jayarya017@example.com">Send Email</a></p>
  
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="./assets/img/team.webp" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Ecom</h2>
        <p class="title">Waterloo</p>
        <p>Variety of Laptops available here</p>
        <p><a href = "mailto: jayarya017@example.com">Send Email</a></p>

      
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="./assets/img/team.webp" alt="John" style="width:100%">
      <div class="container">
        <h2>Ecom</h2>
        <p class="title">Kitchner</p>
        <p>Variety of Mobile Phones available here</p>
        <p><a href = "mailto: jayarya017@example.com">Send Email</a></p>

      
      </div>
    </div>
  </div>
</div>
    <?php footer() ?>
    </body>
</html>