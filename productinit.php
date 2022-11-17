<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                define("INITIALIZING_DATABASE",1);
                require_once("db_conn.php");
                
              
                $pdo->query("use ecom");
                $pdo->query("drop table if exists homeproduct");
                $pdo->query("create table homeproduct(
                    product_id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
                    product_name varchar(100) NOT NULL,
                    product_description varchar(255) NOT NULL,
                    product_qty int(20) NOT NULL,
                    product_price decimal(10,2) NOT NULL,
                    product_addedby char(100) NOT NULL,
                    PRIMARY KEY(product_id)
                )
                
                ");
                
                $pdo->query("insert into homeproduct (product_id,product_name,product_description,product_qty,product_price,product_addedby)
                values
                (1,'Lenovo','I7',10,700,'dhairya'),
                (2,'Hp','I7',10,900,'dhairya'),
                (3,'Dell','I7',10,1000,'dhairya'),
                (4,'Asus','I7',10,800,'dhairya'),
                (5,'Macbook','M2',10,1700,'dhairya')
                ");


                $pdo->query("drop table if exists product");
                
                $pdo->query("create table product(
                    product_id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
                    product_name varchar(100) NOT NULL,
                    product_description varchar(255) NOT NULL,
                    product_qty int(20) NOT NULL,
                    product_price decimal(10,2) NOT NULL,
                    product_addedby char(100) NOT NULL,
                    PRIMARY KEY(product_id)
                )
                
                ");
                
                $pdo->query("insert into product (product_id,product_name,product_description,product_qty,product_price,product_addedby)
                values
                (1,'Lenovo','I7',10,700,'dhairya'),
                (2,'Hp','I7',10,900,'dhairya'),
                (3,'Dell','I7',10,1000,'dhairya'),
                (4,'Asus','I7',10,800,'dhairya'),
                (5,'Macbook','M2',10,1700,'dhairya')

                ");

                
                  
                echo "<h3>DATABASE INITIALIZED</h3>";
            }
        ?>
        <form method="POST">
            <input type="submit" value="Initialize Database">
        </form>
    </body>
</html>



