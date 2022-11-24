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
    <head>
        <link rel="stylesheet" href="./assets/home.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head> 

<nav>
        <ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="cart.php">Cart</a></li>
  <li><a href="products.php">Product</a></li>
  <li><a href="contacts.php">Contact</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
        </nav>
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

