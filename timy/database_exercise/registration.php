<?php
require_once "./dbTools.php";

    if(isset($_POST['submit']) && $_POST['password'] == $_POST['confirm_password']){

        if(register($_POST['username'], $_POST['password'], $_POST['company'], $_POST['email'])){
            header("Location: login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/registration.css"/>
    <title>Registration</title>
</head>
<body>
    <div class="container">
    <div class="form--container">
        <div class="header"><h1>Sign up</h1></div>
        <form method="POST" action="registration.php">
           <div class="form--item">
               <label for="Username">Username: </label><input type="text" name="username" placeholder="username" required/>
           </div> 
           <div class="form--item">
               <label for="Password">Password: </label><input type="password" name="password" placeholder="password" required/>
           </div> 
           <div class="form--item">
               <label for="Confirm Password">Confirm Password: </label><input type="password" name="confirm_password" placeholder="confirm password" required/>
           </div> 

           <div class="form--item">
               <label for="Email">Email: </label><input type="text" name="email" placeholder="emaxple@email.com" required/>
           </div> 
           <div class="form--item">
               <label for="Company">Company: </label><input type="text" name="company" placeholder="company" required/>
           </div> 
            <button class="btn" type="submit" name="submit">Sign Up</button>
        </form>
        
    </div>
</div>
</body>
</html>