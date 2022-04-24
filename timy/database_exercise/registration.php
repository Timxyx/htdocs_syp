<?php
require_once "./dbTools.php";

    if(isset($_POST['submit'])){
        if(register($_POST['user'], $_POST['password'], $_POST['company'], $_POST['email'])){
            
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <form method="POST" action="registration.php">
           <div class="form--item">
               <input type="text" name="username" placeholder="username"/>
           </div> 
           <div class="form--item">
               <input type="password" name="password" placeholder="password"/>
           </div> 
           <div class="form--item">
               <input type="password" name="confirm_password" placeholder="confirm password"/>
           </div> 

           <div class="form--item">
               <input type="text" name="email" placeholder="emaxple@email.com"/>
           </div> 
           <div class="form--item">
               <input type="password" name="company" placeholder="company"/>
           </div> 
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>