<?php
    require('db_conn.php');

    $errors=[];
    $clean_values=$_GET;
    
    if(empty($clean_values['product_id']))
        $errors[] = "<p>User Id not found!</p>";
    else if(!filter_var($clean_values['product_id'],FILTER_VALIDATE_INT))
        $errors[] = "<p>Product Id not an integer!</p>";
    else
        $clean_values['product_id']=(int)$clean_values['product_id'];

    if(count($errors) == 0){
        //Remove all keys except product_id
        $clean_values=array_intersect_key($clean_values,["product_id"=>""]);
        
        $query = "DELETE FROM products WHERE product_id = :product_id";
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
