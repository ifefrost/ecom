<?php
require('db_conn.php');
require_once("functions.inc.php");
redirectIfNotLoggedIn();



$query = 'SELECT * FROM homeproduct'; // replace with paramertized query using mysqli_stmt_bind_param for asynchronous work task
$results = $pdo->query($query);
?>
<!doctype html>
<html>
  <?php include('nav.php'); ?>
  <div class="container">
    <div class="row">
    <?php        
          while($row = $results->fetch())
          {
              
              echo' 
              <div class="col-lg-4 col-md-6 col-sm-12 mb-5 mt-5">
              <div class="card">
              <div class="card-header">
              '.$row['product_name'].'
              </div>
              <img src='.$row['product_img'].' class="card-img-top" alt="notfound">
              <div class="card-body">
                <h5 class="card-title">
                  
                Description '.$row['product_description'].' 
        
                </h5>
                <lable> QTY:
                </lable>
                <input type="number" value='.$row['product_qty'].'  />
                <lable> Price:
                </lable>
                <h5>'.$row['product_price'].' </h5>
              </div>
              <a href="addToCart()" class="btn btn-primary">Add To Cart</a>
            </div>
            </div>';        
          }  
        ?>
      </div>
    </div>
  </body>
</html>

