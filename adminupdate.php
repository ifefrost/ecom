<?php
    require('db_conn.php');

    $clean_values=$_POST;
    
    if(empty($clean_values['product_id']))
        $errors[] = "<p>User Id not found!</p>";
    else if(!filter_var($clean_values['product_id'],FILTER_VALIDATE_INT))
        $errors[] = "<p>User Id not an integer!</p>";
    else
        $clean_values['product_id']=(int)$clean_values['product_id'];

    if(count($errors) == 0){

    
        $clean_values=array_intersect_key($clean_values,
        ["product_id"=>"","product_name"=>"",
         "product_description"=>"","product_qty"=>"",
         "product_price"=>"","product_img"=>""]);
                     
        $query = "UPDATE products SET product_id = :product_id, product_name = :product_name, product_description = :product_description, product_qty = :product_qty,product_price = :product_price,product_img = :product_img WHERE  product_id = :product_id;";
        
        $stmt = $pdo->prepare($query);
        $stmt->execute($clean_values);
        
        header("Location: admindetails.php");
        exit;
        
    } else {
        foreach($errors as $error){
            echo $error;
        }
        echo '<br><a href="admindetails.php">Go Back</a>';
    }
?>
