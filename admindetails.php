<?php
  require('db_conn.php');
  require_once("functions.inc.php");
    $query = 'SELECT * FROM products'; // replace with paramertized query using mysqli_stmt_bind_param for asynchronous work task
    $results = $pdo->query($query);
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>
            Product Details
        </title>
    </head>
    <body>
    <?php adminheader('Admin') ?>
        <div class="container">

        
        <table width="80%">
            <thead>
                <tr>
                    <th>ID</th>
                    
                    <th> Proroduct Name</th>
                    <th>Product Description</th>
                    <th>Quantity Available</th>
                    <th>Price</th>
                    <th>Product Added by</th>
                    <th> Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php 
             
                while($row = $results->fetch())
                {
                    echo  $row['product_id'];
                    $str_to_print="<tr><td>{$row['product_id']}</td>";
                    
                    $str_to_print.="<td>{$row['product_name']}</td>";
                    $str_to_print.="<td>{$row['product_description']}</td>";
                    $str_to_print.="<td>{$row['product_qty']}</td>";
                    $str_to_print.="<td>{$row['product_price']}</td>";
                    $str_to_print.="<td>{$row['product_img']}</td>";
                    $str_to_print.="<td>
                    <a href='adminedit.php?product_id={$row['product_id']}'>Edit</a>
                    <a href='admindelete.php?product_id={$row['product_id']}'>Delete</a>
                    </td></tr>";
                    echo $str_to_print;
                    
                }
                ?>
            </tbody>
        </table>
    </body>
    </div>
</html>








