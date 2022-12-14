
<!doctype html>
<html>
    <body>
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                define("INITIALIZING_DATABASE",1);
                require_once("db_conn.php");
                
                $pdo->query("drop database if exists ecom");
                $pdo->query("create database ecom");
                $pdo->query("use ecom");
                
                $pdo->query("create table user(
                UserId int not null primary key auto_increment,
                Email varchar(50) not null,
                FirstName varchar(50) not null,
                LastName varchar(50) not null,
                PasswordHash varchar(256) not null,
                admin boolean not null default false
                )
                
                ");

                $pdo->query("drop table if exists products");
                
                $pdo->query("create table products (
                    product_id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
                    product_name varchar(100) NOT NULL,
                    product_description varchar(255) NOT NULL,
                    product_qty int(20) NOT NULL,
                    product_price decimal(10,2) NOT NULL,
                    product_img varchar(100) NOT NULL,
                    PRIMARY KEY(product_id)
                )
                
                ");

                $pdo->query("insert into products (product_id,product_name,product_description,product_qty,product_price,product_img)
                values
                (1,'Lenovo','I7',10,700,'./assets/img/h1.jpg'),
                (2,'Hp','I7',10,900,'./assets/img/h2.jpg'),
                (3,'Dell','I7',10,1000,'./assets/img/h3.jpg'),
                (4,'Asus','I7',10,800,'./assets/img/h4.jpg'),
                (5,'Macbook','M2',10,1700,'./assets/img/h5.jpg')
                ");

                $pdo->query("drop table if exists cart");
                
                $pdo->query("create table cart(
                    cart_id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
                    product_id mediumint(8),
                    cart_qty int(20) NOT NULL,
                    userid int(20) NOT NULL,
                    PRIMARY KEY(cart_id)
                )
                
                ");
                

                $hash=password_hash("root",PASSWORD_DEFAULT); 
                
                echo "Password 1: $hash";
                
                $pdo->query("insert into user (Email,FirstName,LastName,PasswordHash,admin)
                values
                ('user1@mail.com','User','One','$hash', true),
                ('user2@mail.com','User','Two','$hash', false)");
                
                echo "<h3>Database Initialized</h3>";
            }
        ?>
        <form method="POST">
            <input type="submit" value="Initialize Database" >
        </form>
    </body>
</html>
















