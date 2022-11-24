<?php
    require_once("functions.inc.php");
    redirect();
    $errors=[];
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["email"])){
            $errors[]="<h3>Please enter a valid email</h3>";
        }
        else  if(empty($_POST["password"])){
            $errors[]="<h3>Please enter a valid password</h3>";
        }
        else
        {
            if(login($_POST["email"],$_POST["password"]))
            {
                $errors[]="<h3>Login Successfull</h3>";
                redirect();
            }
            else{
                $errors[]="<h3>Login Fail</h3> <p>Invalid email or password</p>";
            }
        }
    }

?>
<!doctype html>
<html>
    <html>
<head>
  <link rel="stylesheet" href="./assets/main.css">
  <script src="https://www.google.com/recaptcha/enterprise.js?render=6Ld-XjAjAAAAAJPS4S4zkD393lgPw98H2Ron92DA"></script>
  <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>
    <body class="container">
        <h1>Login</h1>
        <form method="POST">
            <input type="text" name="email" placeholder="email" />
             <input type="password" name="password" placeholder="password" />
             <div class="g-recaptcha" style="padding: 14px;" data-sitekey="6LdwuDAjAAAAAC3Q51x28mHwc9M_KvpFp_8MdyzH"></div>
            <input type="submit" value="submit" />
        </form>
        <?php
        if(isset($errors)){
            foreach($errors as $error)
                echo $error;
        
            
        }
        // var_dump($_SESSION);
        ?>
    </body>
</html>



