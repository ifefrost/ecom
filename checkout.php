<?php

require_once("functions.inc.php");
redirectIfNotLoggedIn();

?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="./assets/home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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



.billBox{
    border-style:solid;
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

    <?php
// define variables and set to empty values
$nameErr = $emailErr = $addressErr = $cityErr = $stateErr = $zipErr = $nocErr = $cardErr = $expmErr = $expyErr = $cvvErr ="";
$name = $email = $address = $city = $state = $zip = $noc = $card = $expm = $expy = $cvv = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["city"])) {
    $cityErr = "city is required";
  } else {
    $city = test_input($_POST["city"]);
  }

  if (empty($_POST["state"])) {
    $stateErr = "Email is required";
  } else {
    $state = test_input($_POST["state"]);
  }

  if (empty($_POST["zip"])) {
    $zipErr = "Zip is required";
  } else {
    $zip = test_input($_POST["zip"]);
  }

  if (empty($_POST["noc"])) {
    $nocErr = "name of card holder is required";
  } else {
    $noc = test_input($_POST["noc"]);
  }

  if (empty($_POST["card"])) {
    $cardErr = "card number is required";
  } else {
    $card = test_input($_POST["card"]);
  }

  if (empty($_POST["expm"])) {
    $expmErr = "month is required";
  } else {
    $expm = test_input($_POST["expm"]);
  }

  if (empty($_POST["expy"])) {
    $expyErr = "year is required";
  } else {
    $expy = test_input($_POST["expy"]);
  }

  if (empty($_POST["cvv"])) {
    $cvvErr = "cvv is required";
  } else {
    $cvv = test_input($_POST["cvv"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

    <nav>
        <ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="products.php">Product</a></li>
  <li><a href="contacts.php">Contact</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
        </nav>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="row">
          <div class="col-50"  >
            <div class="billBox">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="name" name="name"><span class="error">* <?php echo $nameErr;?></span>
             <br><br>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" >
            <span class="error">* <?php echo $emailErr;?></span>
             <br><br>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" >
            <span class="error">* <?php echo $addressErr;?></span>
            <br><br>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" >
            <span class="error">* <?php echo $cityErr;?></span>
            <br><br>
                <div class="row">
                 <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state">
                <span class="error">* <?php echo $stateErr;?></span>
                <br><br>
                </div>
                <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" >
                <span class="error">* <?php echo $zipErr;?></span>
                <br><br>
              </div>
            </div>
          </div>
        </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" >
            <span class="error">* <?php echo $nocErr;?></span>
             <br><br>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" >
            <span class="error">* <?php echo $cardErr;?></span>
            <br><br>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" >
            <span class="error">* <?php echo $expmErr;?></span>
                <br><br>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" >
                <span class="error">* <?php echo $expyErr;?></span>
                <br><br>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" >
                <span class="error">* <?php echo $cvvErr;?></span>
                    <br><br>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label><br>
        <input type="submit" name="submit" value="Continue to checkout" class="btn">

        </form>
        


    
    </body>
</html>

