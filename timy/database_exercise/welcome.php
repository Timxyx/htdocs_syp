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
    <script src="script.js" ></script>
    <title>Timetracker</title>
</head>
<body>
    
    <div class="container">
        <div class="sidebar">
            <a href="welcome.php?cmd=logout" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-log-out"></span> Log out
            </a>
        </div>
        <div class ="content--wrapper" >
            <h1>WELCOME <?php echo $_SESSION['username']; ?></h1>
            <p>Your tracking History:</p>
        <div class="history--container">
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
                    <span class="hidden-child">Test</span>
                </span>
            </div>
            <?php endforeach ?>
        </div>
        <p>Currently running:</p>
        <div class="running--container">
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
        </div class="form--container">         
            <form method="POST" action="welcome.php">
                <div>Start a new tracking:</div>
                <input type="text" name="name" placeholder="Name" />
                <input type="text" name="description" placeholder="Description"/>
                <button onclick="reloadFunc" class="playButton" type="submit" name="submit" >start</button>
            </form>
        </div>

    </div>
</body>
</html>