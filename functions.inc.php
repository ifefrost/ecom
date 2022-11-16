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
           header("Location: welcome.php");
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
    





