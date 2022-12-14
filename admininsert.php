<?php
    require("db_conn.php");
    
    $errors=[];
    
    if(empty($_POST["product_name"]))
        $errors[]="<p>Name is required</p>";
    else
        $product_name=htmlspecialchars($_POST["product_name"]);
    
   
        if(empty($_POST["product_description"]))
        $errors[]="<p>Description is required</p>";
    else
        $product_description=htmlspecialchars($_POST["product_description"]);
    
        
        if(empty($_POST["product_qty"]))
        $errors[]="<p>Quantity is required</p>";
    else
        $product_qty=htmlspecialchars($_POST["product_qty"]);
    

        if(empty($_POST["product_price"]))
        $errors[]="<p>Price is required</p>";
    else
        $product_price=htmlspecialchars($_POST["product_price"]);

        if(empty($_POST["product_img"]))
        $errors[]="<p>Img  is required</p>";
    else
        $product_img=htmlspecialchars($_POST["product_img"]);
    
    if(count($errors)>0) 
    {
        foreach($errors as $error)
            echo $error;
        echo '<br><a href="index.php">Go Back</a>';
    }
    else
    {
        $clean_values=$_POST;
    
        $clean_values=array_intersect_key($clean_values,
        ["product_id"=>"","product_name"=>"",
         "product_description"=>"","product_qty"=>"",
         "product_price"=>"","product_img"=>""]);


        $query="insert into products (product_name,product_description,product_qty,product_price,product_img) 
                values (:product_name,:product_description,:product_qty,:product_price,:product_img)";
                $stmt = $pdo->prepare($query);
                $result=$stmt->execute($clean_values);
    
        if($result)
        {
            header("Location: admindetails.php");
            exit();
        }
        else
        {
            echo "<br>Some error saving the data.";
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


