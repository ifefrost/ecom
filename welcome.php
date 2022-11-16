<?php

require_once("functions.inc.php");
redirectIfNotLoggedIn();

?>
<!doctype html>
<html>
    <body>
        <?php
            if(!empty($_SESSION["UserId"]))
            {
                $userId=filter_var($_SESSION["UserId"],FILTER_VALIDATE_INT,FILTER_NULL_ON_FAILURE);
                if($userId==null){
                    logout();
                    redirectIfNotLoggedIn();
                    exit();
                }
                $stmt=$pdo->prepare("select * from user where UserId=:userid");
                $stmt->execute([
                    "userid" => $userId
                    ]);
                    if($stmt->rowCount()==1)
                    {
                        $row=$stmt->fetch(PDO::FETCH_ASSOC);
                        echo"<h1>Welcome, {$row['FirstName']} {$row['LastName']}! </h1>";
                        echo"<p>You are logged in.</p>";
                        echo"<a href='logout.php'>Log out</a>";
                    }
            }
        ?>
    </body>
</html>

