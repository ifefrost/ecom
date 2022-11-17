<?php
require('db_conn.php');
require_once("functions.inc.php");
redirectIfNotLoggedIn();



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
    <body class="container">
    <nav>
        <ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="products.php">Product</a></li>
  <li><a href="contacts.php">Contact</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
        </nav>
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

