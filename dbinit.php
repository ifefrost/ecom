
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
                PasswordHash varchar(256) not null
                )
                
                ");
                $hash=password_hash("root",PASSWORD_DEFAULT); 
                
                echo "Password 1: $hash";
                
                $hash=password_hash("root",PASSWORD_DEFAULT); 
                
                echo "Password 2: $hash";
                
                $pdo->query("insert into user (Email,FirstName,LastName,PasswordHash)
                values
                ('user1@mail.com','User','One','$hash')");
                
                echo "<h3>Database Initialized</h3>";
            }
        ?>
        <form method="POST">
            <input type="submit" value="Initialize Database" >
        </form>
    </body>
</html>
















