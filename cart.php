<?php
require('db_conn.php');
require_once("functions.inc.php");
redirectIfNotLoggedIn();



$query = 'SELECT * FROM cart'; // replace with paramertized query using mysqli_stmt_bind_param for asynchronous work task
$results = $pdo->query($query);
$row = $results->fetch();
$temp = array();

for($i=0;$i<=count($row);$i++){
  array_push( $temp,$row['product_price']);  
}

?>
<!doctype html>
<html>
    <?php include('nav.php'); ?>
    <body class="container">
   
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
                        
                        <div class="card-body">
                        <img src="./assets/img/h1.jpg" class="card-img-top" name="product_img" alt="notfound" />
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
                
                     
                
                      </div>
               
                      </div>
                    ';
                    
                    }

                    
                ?>
 </div>

 </div>
   
      <div class="margin" style="margin: 5rem;">
      <?php
         echo '<h5>Total Amount-'.array_sum($temp).' </h5>';
      ?>
      <form action="checkout.php">
      <input type="submit" value="Checkout">
      </form>
    
 
      </div>
     
    </body>
</html>

