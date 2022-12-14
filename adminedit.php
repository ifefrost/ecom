<?php 
    require("./db/db_conn.php");
    require_once("./db/functions.inc.php");
    $error = null;
    if(!empty($_GET['product_id']))
    {
        $product_id=(int)htmlspecialchars($_GET['product_id']);
        // echo "1-if";

    }
    else{
        $product_id=null;
        // echo "1-else";

        $error="<p>Error! Product id not found</p>";
        echo $error;
    }
    if($error == null){
        // echo "2-if";
        $clean_values=$_GET;
        $clean_values=array_intersect_key($clean_values,["product_id"=>""]);
        
        $query = "SELECT * FROM products WHERE product_id = :product_id"; // replace with paramertized query using mysqli_stmt_bind_param
        $stmt=$pdo->prepare($query);
        $stmt->execute($clean_values);
        
        if($stmt->rowCount() == 1){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $name = $row['product_name'];
            $description = $row['product_description'];
            $qty = $row['product_qty'];
            $price = $row['product_price'];
            $img = $row['product_img'];
        } 
    }else{
        // echo "2-else";

        echo $error;
        exit();
    }
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

        
        <form class="form" action="adminupdate.php" method="post" id="update_form">
            <div class="subtitle">Please enter the data to be saved in the Database</div>
            <div class="input-container ic2">
                <input type="text" class="input" id="product_id" name="product_id"  value="<?php echo $product_id; ?>"/>
                <label for="product_id" >product_id</label>
            </div>
            <div class="input-container ic2">
                <input type="text" class="input" id="product_name" name="product_name" value="<?php echo $name; ?>"/>
                <label for="product_name" >product_name</label>
            </div>
            <div class="input-container ic2">
                <input type="text" class="input" id="product_description" name="product_description" value="<?php echo $description; ?>"/>
                <label for="product_description" >product_description</label>
            </div>
            <div class="input-container ic2">
                <input type="number" class="input" id="product_qty" name="product_qty" value="<?php echo $qty; ?>"/>
                <label for="product_qty" >product_qty</label>
            </div>
            <div class="input-container ic2">
                <input type="number" class="input" id="product_price" name="product_price" value="<?php echo $price; ?>"/>
                <label for="product_price" >product_price</label>
            </div>
            <div class="input-container ic2">
            <input type="text" class="input" id="product_img" name="product_img" value="<?php echo $img; ?>"/>
                <label for="product_img" >product_img</label>
         
            </div>
            <button type="submit" class="submit">Update data into DB</button>
        </form>
        </div>
    </body>
</html>




