<?php

require_once("./db/functions.inc.php");
redirectIfNotLoggedIn();

?>
<!doctype html>
<html>
  <?php pageheader('Checkout') ?>
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
    label {
      margin-bottom: 10px;
      display: block;
    }
    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    .col-50 {
        -ms-flex: 50%; /* IE10 */
        flex: 50%;
      }
      @media (max-width: 800px) {
      /* .row {
        flex-direction: column-reverse; */
      
      .col-25 {
        margin-bottom: 20px;
      }
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
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
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
    $stateErr = "state is required";
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
    if(!preg_match ("/^[0-9]*$/", $card)){
        $cardErr="number only for card";
    }
    if (strlen($card)!= 16) {  
        $cardErr = "card no must contain 16 digits.";  
        }  
    
  }

  if (empty($_POST["expmonth"])) {
    $expmErr = "month is required";
  } else {
    $expm = test_input($_POST["expmonth"]);
    if(!preg_match ("/^[0-9]*$/", $expm)){
        $expmErr="number only for month";
    }
    if (strlen($expm)!= 2) {  
        $expmErr = "Month  must contain 2 digits.";  
        }  
  }

  if (empty($_POST["expyear"])) {
    $expyErr = "year is required";
  } else {
    $expy = test_input($_POST["expyear"]);
    if(!preg_match ("/^[0-9]*$/", $expy)){
        $expyErr="number only for year";
    }
    if (strlen($expy)!= 2) {  
        $expyErr = "Year must contain 2 digits.";  
        }  
  }

  if (empty($_POST["cvv"])) {
    $cvvErr = "cvv is required";
  } else {
    $cvv = test_input($_POST["cvv"]);
    if(!preg_match ("/^[0-9]*$/", $cvv)){
        $cvvErr="number only for cvv";
    }
    if (strlen($cvv)!= 3) {  
        $cvvErr = "cvv must contain 3 digits.";  
        }  
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

        <form method="POST" action="invoice.php">
        <div class="row">
          <div class="col-50"  >
            
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label><?php echo $nameErr;?>
            <input type="text" id="name" name="name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label><?php echo $emailErr;?>
            <input type="text" id="email" name="email" >
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label><?php echo $addressErr;?>
            <input type="text" id="adr" name="address" >
            <label for="city"><i class="fa fa-institution"></i> City</label> <?php echo $cityErr;?>
            <input type="text" id="city" name="city" >
                <div class="row">
                 <div class="col-50">
                <label for="state">State</label> <?php echo $stateErr;?>
                <input type="text" id="state" name="state">
                </div>
                <div class="col-50">
                <label for="zip">Zip</label><?php echo $zipErr;?>
                <input type="text" id="zip" name="zip" >   
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
            <label for="cname">Name on Card</label><?php echo $nocErr;?>
            <input type="text" id="cname" name="noc" >
            <label for="ccnum">Credit card number</label><?php echo $cardErr;?>
            <input type="text" id="ccnum" name="card" >
            <label for="expmonth">Exp Month</label><?php echo $expmErr;?>
            <input type="text" id="expmonth" name="expmonth" >
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label><?php echo $expyErr;?>
                <input type="text" id="expyear" name="expyear" >
                
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label><?php echo $cvvErr;?>
                <input type="text" id="cvv" name="cvv" >
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" name="submit" value="Continue to checkout" class="button">

        </form>
        


    
    </body>
</html>

