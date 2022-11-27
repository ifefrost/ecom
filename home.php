<?php
require('db_conn.php');
require_once("functions.inc.php");
redirectIfNotLoggedIn();


if($_SERVER['REQUEST_METHOD']=='POST')
{
 addToCart();
  
} 






$query = 'SELECT * FROM homeproduct'; // replace with paramertized query using mysqli_stmt_bind_param for asynchronous work task
$results = $pdo->query($query);
?>
<!doctype html>
<html>
    <?php include('nav.php'); ?>
    <body class="container">
   
        <div class="container">
        <div class="row">
  

        



<?php
require_once("functions.inc.php");

                    while($row = $results->fetch())
                    {
                        
                       echo' 
                       <div class="col-lg-4 col-md-6 col-sm-12 mb-5 mt-5">
                       <form  method="POST"  action="addToCart.php">
   
                       <div class="card">
                      
                       <div class="card-header" name="product_name">
                      <input type="text"  name="product_name" value='.$row['product_name'].' />
                        </div>
                        <img src='.$row['product_img'].' class="card-img-top" name="product_img" alt="notfound">
                        <div class="card-body">Description:
                          <input class="card-title" name="product_description"
                           
                         value='.$row['product_description'].' 
                          
                          
                          
                          />
                          <lable> QTY:
                          </lable>
                          <input type="number" name="product_qty" value='.$row['product_qty'].'  />
                         <br> <lable> Price:
                          </lable>
                          <input type="number" name="product_price" value='.$row['product_price'].' />
                        </div>
                        <input type="submit" value="Add to Cart">
                      </div>
                      </form>
                      </div>
                    ';
                    
                    }

                    
                ?>
 </div>

 </div>
    
    </body>
</html>

