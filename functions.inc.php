<?php 

    require_once("db_conn.php");
    session_start();
    
    
    function login($email, $password)
    {
        global $pdo;
        
        $stmt=$pdo->prepare(
            "select UserId,PasswordHash from user
            where Email=:email"
            );
            $stmt->execute([
                "email" => $email
                ]);
                
                if($stmt->rowCount()==1)
                {
                    $row=$stmt->fetch(PDO::FETCH_ASSOC);
                    if(password_verify($password,$row["PasswordHash"])){
                        session_regenerate_id();
                        $_SESSION["UserId"]=$row["UserId"];
                        return true;
                    }
                }
                return false;
    }
    
    function logout()
    {
        $_SESSION=[];
        session_destroy();
        setcookie("PHPSESSID",'',time()-3600,'/','',0,0);
        header("Location: login.php");
        exit();
    }
    
    function redirect(){
       if(!empty($_SESSION["UserId"])) 
       {
           header("Location: home.php");
           exit();
       }
       
    }
     function redirectIfNotLoggedIn(){
       if(empty($_SESSION["UserId"])) 
       {
           header("Location: login.php");
           exit();
       }
       
    }
    
    function addToCart(){
    
        if(!empty($_GET['product_id']))
        {
            $product_id=(int)htmlspecialchars($_GET['product_id']);
        }
        else{
            $user_id=null;
            $error="<p>Error! Product id not found</p>";
            echo $error;
        }
        if($error=null){
            $query="select * from cart where product_id=?";
            $stmt=mysqli_prepare($dbc,$query);
            mysqli_stmt_bind_param($stmt,'i',$product_id);
            $result = @mysqli_stmt_execute($stmt);
            
            if($result){
            $result=mysqli_stmt_get_result($stmt);
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $product_id=$row["product_id"];
            $product_name=$row["product_name"];
            $product_description=$row["product_description"];
            $product_qty=$row["product_qty"];
            $product_price=$row["product_price"];
            $product_img=$row["product_img"];
            }
        }else{
            echo $error;
            exit();
        }
     }




