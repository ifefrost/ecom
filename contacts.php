<?php
require("submit.php");
require_once("./db/functions.inc.php");
redirectIfNotLoggedIn();

?>
<!doctype html>
<html>
<?php pageheader('About') ?>


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

.contact {
    background-color: #fff;
    width: 500px;
    margin: 0 auto;
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,.2);
}
.contact .fields {
    position: relative;
    padding: 15px;
}
.contact input[type="text"], .contact input[type="email"] {
    display: block;
    margin-top: 15px;
    padding: 15px;
    border: 1px solid #dfe0e0;
    width: 100%;
}
.contact input[type="text"]:focus, .contact input[type="email"]:focus {
    border: 1px solid #c6c7c7;
}
.contact input[type="text"]::placeholder, 
.contact input[type="email"]::placeholder, 
.contact textarea::placeholder {
    color: #858688;
}
.contact textarea {
    resize: none;
    margin-top: 15px;
    padding: 15px;
    border: 1px solid #dfe0e0;
    width: 100%;
    height: 150px;
}
.contact textarea:focus {
    border: 1px solid #c6c7c7;
}
.contact input[type="submit"] {
    display: block;
    margin-top: 15px;
    padding: 15px;
    border: 0;
    background-color: #518acb;
    font-weight: bold;
    color: #fff;
    cursor: pointer;
    width: 100%;
}
.contact input[type="submit"]:hover {
    background-color: #3670b3;
}
.contact input[name="email"] {
    position: relative;
    display: block;
}
.contact label {
    position: relative;

}
.contact label i {
    position: absolute;
    color: #dfe2e5;
    top: 31px;
    left: 15px;
    z-index: 10;
}
.contact label i ~ input {
    padding-left: 45px !important;
}
.form-container{
    background-color:  #3670b3  ;
}
.contact .responses {
    padding: 15px;
    margin: 0;
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
            	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Contact Form</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	
	</head>

        <body class="container">
        <div class="contact-section">
       
  <h1>Contact Us Page</h1>
  <p>Some text about who we are and what we do.</p>
  <p>Resize the browser window to see that this page is responsive by the way.</p>
</div>
</div>
  <div class="form-container">
  <div class="col-50 m-5 p-5"  >


 
		<form class="contact p-5" method="post" action="submit.php">
			
			<div class="fields">
				<label for="email">
					<i class="fas fa-envelope"></i>
					<input id="email" type="email" name="email" placeholder="Your Email" required>
				</label>
				<label for="name">
					<i class="fas fa-user"></i>
					<input type="text" name="name" placeholder="Your Name" required>
				<label>
				<input type="text" name="subject" placeholder="Subject" required>
				<textarea name="msg" placeholder="Message" required></textarea>
			</div>
			<input type="submit">
		</form>
	</body>
</html>
</div>
</div>


    <?php footer() ?>
    </body>
</html>

