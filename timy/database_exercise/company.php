
<?php
     require_once './dbTools.php';
    
    
     if(!isset($_SESSION)){
         session_start();
     }
     
     $cmd = getPara("cmd", "", "GET");
 
     if($cmd =="logout"){
         session_destroy();
         header("Location: welcome.php");
     }
     include("auth.php");
 
     $username = $_SESSION['username'];
    $company = getCompanyName($username);
    $duration = getDuration($username);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/company.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Company Details</title>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <a href="welcome.php" class="navigation-button">
                <i class="fa fa-pencil"></i>
            </a>
            <a href="welcome.php?cmd=logout" class="logout-button">
                EXIT <span class="fa fa-sign-out"></span>
            </a>
        </div>
 
        <div class="top">Your Company is <?php echo $company?>  </div>
        <div class="mid">
            <h3>Your companies combined work time sums up to:</h3>
            <p>
                <?php echo gmdate("H:i:s", $duration); ?>
            </p>
        </div>
    </div>
</body>
</html>