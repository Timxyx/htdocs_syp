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


    $id = getPara("id", 0, "GET");

    $history = getHistory($_SESSION['username']);
    $running = getRunning($_SESSION['username']);

    if($cmd == "stop"){
        stopItem($id, time());
        $id = 0;
    }
    
    $id = getPara("id", 0, "GET");

    if ($cmd == "delete") {
        deleteItem($id);
        $id = 0;
    }

    if(isset($_POST['submit'])) {
        startTracking($_POST['name'], $_POST['description']);
        header("Location: welcome.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js" ></script>
    <title>Timetracker</title>
</head>
<body>
    
    <div class="container">
        <div class="sidebar">
            <a href="company.php" class="navigation-button">
                <i class="fa fa-briefcase"></i>
            </a>
            <a href="welcome.php?cmd=logout" class="logout-button">
                EXIT <span class="fa fa-sign-out"></span>
            </a>
        </div>
        <div class ="content--wrapper" >
            <h1>WELCOME <?php echo $_SESSION['username']; ?></h1>
        <details class="history--container" open>
            <summary>Your tracking History:</summary>
            <div class="tracking-header">
                <span>Name</span>
                <span>Description</span>
                <span>Date</span>
                <span>Duration</span>
            </div>
        <?php foreach($history as $item): ?>
            <div class="history--item--container">
                <span class="history--item"><?php echo $item[0]; ?></span>
                <span class="history--item"><?php echo $item[1]; ?></span>
                <span class="history--item"><?php echo date( 'd.m.Y', strtotime(str_replace('/', '-', $item[2]))); ?></span>
                <?php
                    $ts1 = strtotime(str_replace('/', '-', $item[2]));
                    $ts2 = strtotime(str_replace('/', '-', $item[3]));
                    $diff = abs($ts1 - $ts2);
                    $diff = gmdate("H:i:s", $diff); 
                ?>
                <span class="history--item parent"><?php echo $diff; ?>
                    <span class="hidden-child"><?php echo gmdate("H:i:s", $ts1); ?> - <?php echo gmdate("H:i:s", $ts1); ?></span>
                    <a class="delete-btn" href="welcome.php?id=<?php echo $item[4] ?>&cmd=delete">delete</a>
                </span>
                
            </div>
                
            <?php endforeach ?>
        </details>
        <details class="running--container" open>
            <summary>Current running:</summary>
            <div class="running-tracking-header">
                <span>Name</span>
                <span>Description</span>
                <span>Duration</span>
                <span>Duration</span>
            </div>
            <?php foreach($running as $item): ?>
                <div class="running--item--container">
                    <span class="running--item"><?php echo $item[0]; ?></span>
                    <span class="running--item"><?php echo $item[1]; ?></span>
                    <?php
                        $ts1 = strtotime(str_replace('/', '-', $item[2]));
                        $ts2 = time();
                        $diff = abs($ts1 - $ts2);
                        //$diff = gmdate("H:i:s", $diff); 
                    ?>
                    <span class="running--item counter" diff=<?php echo $diff; ?>>0:0:0</span>
                    <a class="link button" href="welcome.php?id=<?php echo $item[4]?>&cmd=stop">stop</a>
                </div>
            <?php endforeach ?>
            </details>
            <div>
        </div class="form--container">         
            <form method="POST" action="welcome.php">
                <div>Add a new tracking:</div>
                <input type="text" name="name" placeholder="Name" />
                <input type="text" name="description" placeholder="Description"/>
                <button onclick="reloadFunc" class="playButton" type="submit" name="submit" >add</button>
            </form>
        </div>

    </div>
</body>
</html>