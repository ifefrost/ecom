<?php

require_once("./db/functions.inc.php");
redirectIfNotLoggedIn();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>
            Insertion Form
        </title>
    </head>
    <body>
    <?php adminheader('Admin') ?>
        <div class="container">

        
        <form class="form" action="admininsert.php" method="post" id="registration_form">
            <div class="subtitle">Please enter the data to be saved in the Database</div>
            <div class="input-container ic2">
                <input type="text" class="input" id="name" name="product_name"/>
                <label for="product_name" >product_name</label>
            </div>
            <div class="input-container ic2">
                <input type="text" class="input" id="product_description" name="product_description"/>
                <label for="product_description" >product_description</label>
            </div>
            <div class="input-container ic2">
                <input type="number" class="input" id="product_qty" name="product_qty"/>
                <label for="product_qty" >product_qty</label>
            </div>
            <div class="input-container ic2">
                <input type="number" step="0.1" class="input" id="product_price" name="product_price"/>
                <label for="product_price" >product_price</label>
            </div>
            <div class="input-container ic2">
            <input type="text" step="0.1" class="input" id="product_img" name="product_img"/>
                <label for="product_img">product_img</label>
            </div>
            <button type="submit" class="submit">Insert data into DB</button>
        </form>
        </div>
    </body>
</html>


