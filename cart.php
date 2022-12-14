<?php
require('db_conn.php');
require_once("functions.inc.php");
redirectIfNotLoggedIn();

if($_SERVER['REQUEST_METHOD']=='POST')
  {
    removeFromCart($_POST);
  }

$results = fetchCart();

?>
<!doctype html>
<html>
  <?php pageheader('Cart') ?>
  <body class="container">
    <div class="container">
      <div class="row">
      <?php
        array_map(function($row){
          echo 
          ' 
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src='.$row['product_img'].' class="img-fluid rounded-start" alt="product image">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">
                      '.$row['product_name'].'
                    </h5>
                    <p class="lead">
                      Description: '.$row['product_description'].'
                    </p>
                    <div class="d-flex justify-content-between">
                      <p class="card-text">
                        Price: '.$row['product_price'].'
                      </p>
                      <p class="card-text">
                        <label for="cart_qty">Number in Cart:</label> <input type="number" name="cart_qty" value='.$row['cart_qty'].' />
                      </p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <a href="product.php?id='.$row['product_id'].'" class="btn btn-primary">View Product</a>
                      <form method="post">
                        <input type="hidden" name="product_id" value='.$row['product_id'].' />
                        <input type="submit" name="remove" value="Remove" class="btn btn-danger" />
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          '; 
        }, $results);     
      ?>
      </div>
    </div>
    <div class="margin" style="margin: 5rem;">
      <?php
        echo '<h5>Total Amount- &dollar;'.(fetchCartTotalPrice()["total"]).' </h5>';
      ?>
      <form action="checkout.php">
        <input type="submit" value="Checkout">
      </form>
    </div>
    <?php footer() ?>
  </body>
</html>

