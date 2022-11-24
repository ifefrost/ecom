<?php

require('db_conn.php');
$clean_values=$_POST;

    $clean_values=array_intersect_key($clean_values,
        ["product_id"=>"",
        "product_name"=>"",
        "product_description"=>"",
        "product_qty"=>'',
        "product_price"=>''
      
        
        ]
);
$clean_values[product_id]= rand(1,100);
$query= "INSERT INTO cart( product_id,
product_name,
product_description,
product_qty,
product_price
) VALUES (
    :product_id,
            :product_name,
            :product_description,
            :product_qty,
            :product_price

)";
    $stmt= $pdo->prepare($query);
    $result=$stmt->execute($clean_values);

header("Location: cart.php");




