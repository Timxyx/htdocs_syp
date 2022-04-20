<?php
require_once './db.php';
require_once './tools.php';

$user = getPara("user");
$pwd = getPara("pwd");
$submit = getPara("submit");

if($submit == "anmelden"){
    if(checkUser($user, $pwd)){
        setcookie("login", "ok", time() + 60*1);
        header("Location: items.php");
    }
    else{
        $errorMessage[] = "User does not exist";
    }    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="./styles/styles.css"/>
<title>simple authentication</title>
</head>
<body>
<div class="container flex justify-center items-center flex-col min-w-full">
    <div class="top bg-gray-400 mb-40"></div>

    <div class="content mb-40">
        <div class="login-box">

            <form action="login.php" method="POST" class="grid-cols-12 border-2 p-3">

                <div class="login-container cols-span-12 flex justify-between mb-5">
                    <label class="cols-span-3 cols-start-1 mr-2">Login</label>
                    <input type="text" class="cols-span-3 cols-start-4" name="user" placeholder="username"/>
                </div>

                <div class="login-container cols-span-12 flex justify-between mb-5">
                    <label class="cols-span-3 cols-start-1 mr-2">Password</label>
                    <input type="password" class="cols-span-6 cols-start-4 mb-5" name="pwd" placeholder="password"/>
                </div>
                
                
                <button class="cols-span-12 min-w-full bg-gray-300 rounded" value="anmelden"name="submit" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="bottom bg-gray-400 mb-40"></div>


</div>

</body>
</html>