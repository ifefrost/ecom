<?php 

    require_once("db_conn.php");
    session_start();
    
    
    function login($email, $password)
    {
        global $pdo;
        
        $stmt=$pdo->prepare(
            "select UserId, PasswordHash from user
            where Email=:email"
            );
            $stmt->execute([
                "email" => $email
                ]);
                if($stmt->rowCount()==1)
                {
                    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);                
                    if(password_verify($password,$row[0]["PasswordHash"])){
                        session_regenerate_id();
                        $_SESSION["UserId"]=$row[0]["UserId"];
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

    function getUserDetails(){
        global $pdo;
        $query="SELECT * FROM user WHERE UserId = ?";
        $stmt=$pdo->prepare($query);
        $stmt->execute([$_SESSION['UserId']]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    
    function addToCart(array $request){
        if(isset($request['product_id'], $request['cart_qty']))
        {
            echo "product id: ".$request['product_id']." product qty: ".$request['cart_qty'];
            $product = (int)htmlspecialchars($request['product_id']);
            $quantity = (int)htmlspecialchars($request['cart_qty']);

            global $pdo;

            $query="INSERT INTO cart (product_id, cart_qty, userid) VALUES (?, ?, ?)";
            $stmt=$pdo->prepare($query);
            $stmt->execute([$product, $quantity, $_SESSION['UserId']]);
            $success = "Product added to cart";
            echo "<script>alert('$success')</script>";
        }
        else {
            $error ="<p>There was an error adding the product to the cart</p>";
            echo $error;
        }      
    }

    function removeFromCart(array $request){
        if(isset($request['product_id']))
        {
            $product = (int)htmlspecialchars($_POST['product_id']);

            global $pdo;

            $query="DELETE FROM cart WHERE product_id = ? AND userid = ?";
            $stmt=$pdo->prepare($query);
            $stmt->execute([$product, $_SESSION['UserId']]);
            $success = "Product removed from cart";
            echo "<script>alert('$success')</script>";
        }
        else {
            $error ="<p>There was an error removing the product from the cart</p>";
            echo $error;
        }      
    }

    function fetchCart(){
        global $pdo;
        $query="SELECT * FROM cart JOIN products ON cart.product_id = products.product_id WHERE userid = ?";
        $stmt=$pdo->prepare($query);
        $stmt->execute([$_SESSION['UserId']]);
        $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cart;
    }

    function fetchCartTotal(){
        global $pdo;
        $query="SELECT SUM(cart_qty) AS total FROM cart WHERE userid = ?";
        $stmt=$pdo->prepare($query);
        $stmt->execute([$_SESSION['UserId']]);
        $cartTotal = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cartTotal;
    }

    function fetchCartTotalPrice(){
        global $pdo;
        $query="SELECT SUM(cart_qty * product_price) AS total FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE userid = ?";
        $stmt=$pdo->prepare($query);
        $stmt->execute([$_SESSION['UserId']]);
        $cartTotalPrice = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cartTotalPrice;
    }

     function pageheader($title) {
        echo "<!DOCTYPE html>
        <html>
            <head>
                <meta charset='utf-8'>
                <title>$title</title>
                <link rel='stylesheet' href='./assets/home.css'>
                <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css'>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js' integrity='sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk' crossorigin='anonymous'></script>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3' crossorigin='anonymous'></script>
            </head>
            <body>
                <header>
                    <div class='content-wrapper'>
                        <nav>
             
                     
        
                    
                            <ul>
                            <a href='home.php'><img src='./assets/img/Logo.png' alt='Logo' width='100'></a>
                                <li><a href='home.php'>Home</a></li>
                                <li><a href='cart.php'>Cart <i class='fas fa-shopping-cart'></i></a></li>
                                <li><a href='products.php'>Product</a></li>
                                <li><a href='contacts.php'>Contact</a></li>
                                <li><a href='about.php'>About</a></li>
                                <li><a href='logout.php'>Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </header>";
        }
        function adminheader($title) {
            echo "<!DOCTYPE html>
            <html>
                <head>
                    <meta charset='utf-8'>
                    <title>$title</title>
                    <link rel='stylesheet' href='./assets/admin.css'>
                    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css'>
                    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
                    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js' integrity='sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk' crossorigin='anonymous'></script>
                    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3' crossorigin='anonymous'></script>
                </head>
                <body>
                    <header>
                        <div class='content-wrapper'>
                            <nav>
                                <ul>
                                <a><img src='./assets/img/Logo.png' alt='Logo' width='100'></a>
                                    <li><a href='admin.php'>Admin (Insert)</a></li>
                                   
                                    <li><a href='admindetails.php'>Edit/Delete</a></li>
                                    
                                    <li><a href='logout.php'>Logout</a></li>
                                </ul>
                            </nav>
                        </div>
                    </header>";
            }

        function footer() {
        $year = date('Y');
        echo "<footer>
                <div class='content-wrapper'>
                    <p>&copy; $year, Shopping Cart System</p>
                </div>
            </footer>";
        }

    

?>

