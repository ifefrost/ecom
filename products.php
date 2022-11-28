<?php
  require('db_conn.php');
  require_once("functions.inc.php");
  redirectIfNotLoggedIn();

  $query = 'SELECT * FROM products'; // replace with paramertized query using mysqli_stmt_bind_param for asynchronous work task
  $results = $pdo->query($query);
?>
<!DOCTYPE html>
<html>
  <?php pageheader('Products') ?>
  <body class="container">
    <div class="container">
      <div class="row">
        <?php        
          while($row = $results->fetch())
          {  
            echo'
              <div class="col-lg-4 col-md-6 col-sm-12 mb-5 mt-5">
                <div class="card">
                  <img src='.$row['product_img'].' class="card-img-top" name="product_img" alt="notfound">
                  <div class="card-body">
                    <h5 class="card-title">
                      '.$row['product_name'].'
                    </h5>
                    <p class="card-text">
                      Description: '.$row['product_description'].' 
                    </p>
                    <p class="card-text">
                      Price: &dollar;'.$row['product_price'].'
                    </p>
                    <p class="card-text">
                      Quantity: '.$row['product_qty'].'
                    </p>
                  </div>
                  <a href="product.php?id='.$row['product_id'].'" class="btn btn-primary">View Product</a>
                </div>
              </div>
            ';        
          }  
        ?>
      </div>
    </div>
    <?php footer() ?>
  </body>
</html>

