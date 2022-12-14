<?php
    require_once("./db/functions.inc.php");
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
                echo '$_POST["email"]';
                if($_POST["email"] == "user1@mail.com")
                {
                    $errors[]="<h3>Login Successfull</h3>";
                      header("Location: admin.php");
           exit();

                }else{
                    $errors[]="<h3>Login Successfull</h3>";
                    redirect();
                }
        
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
  <script>
    function validate_form() {

const recaptcha = (grecaptcha.getResponse()) ? true : false;

if (recaptcha) { 
    return true;
}
else {
    alert("You must check the 'I am not a robot' box before you can start a game!");
    return false;
}
}
    </script>
</head>
    <body class="container">
        <h1>Login</h1>
        <form method="POST" onsubmit="return validate_form()">
            <input type="text" name="email" placeholder="email" />
             <input type="password" name="password" placeholder="password" />
             <div class="g-recaptcha" style="padding: 14px;" data-sitekey="6LdwuDAjAAAAAC3Q51x28mHwc9M_KvpFp_8MdyzH" require></div>
            <input type="submit" value="submit" />
        </form>
        <li><a href='register.php'>Register Now</a></li>
        <?php
        if(isset($errors)){
            foreach($errors as $error)
                echo $error;
        
            
        }
        // var_dump($_SESSION);
        ?>
    </body>
</html>



