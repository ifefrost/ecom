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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
  

        
<table width="80%">
    <thead>
        <tr>
            <th>ID</th>        
            <th> PRoroduct Name</th>
            <th>Product Description</th>
            <th>Quantity Available</th>
            <th>Price</th>
            <th>Product Added by</th>
            <th> Modify</th>
        </tr>
    </thead>
    <tbody>


<?php
                  
                    while($row = $results->fetch()){
                      
                        $str_to_print="<tr><td>{$row['product_id']}</td>";
                        
                        $str_to_print.="<td>{$row['product_name']}</td>";
                        $str_to_print.="<td>{$row['product_description']}</td>";
                        $str_to_print.="<td>{$row['product_qty']}</td>";
                        $str_to_print.="<td>{$row['product_price']}</td>";
                        $str_to_print.="<td>{$row['product_addedby']}</td>";
                        $str_to_print.="<td>
                        <a href='edit.php?product_id={$row['product_id']}'>Edit</a>
                        <a href='delete.php?product_id={$row['product_id']}'>Delete</a>
                        </td></tr>";
                        echo $str_to_print;
                    }

                    
                ?>
    </tbody>
</table>

 </div>
    
    </body>
</html>

