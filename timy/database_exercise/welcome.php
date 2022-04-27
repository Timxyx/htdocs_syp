<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include("auth.php");
    require_once './dbTools.php';


    $id = getPara("id", 0, "GET");
    $cmd = getPara("cmd", "", "GET");

    $history = getHistory($_SESSION['username']);
    $running = getRunning($_SESSION['username']);

    if($cmd == "stop"){
        stopItem($id, time());
        $id = 0;
    }
    

    if(isset($_POST['submit'])) {
        startTracking($_POST['name'], $_POST['description']);
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
        <div class="sidebar"></div>
        <div class ="content--wrapper" >
            <h1>WELCOME</h1>
            <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
        <div class="history--container">
        <?php foreach($history as $item): ?>
            <div class="history--item--container">
                <span class="history--item"><?php echo $item[0]; ?></span>
                <span class="history--item"><?php echo $item[1]; ?></span>
                <span class="history--item"><?php echo $item[2]; ?></span>
                <span class="history--item"><?php echo $item[3]; ?></span>
                <?php
                    $ts1 = strtotime(str_replace('/', '-', $item[2]));
                    $ts2 = strtotime(str_replace('/', '-', $item[3]));
                    $diff = abs($ts1 - $ts2);
                    $diff = gmdate("H:i:s", $diff); 
                ?>
                <span class="history--item"><?php echo $diff; ?></span>
            </div>
            <?php endforeach ?>
        </div>
        <div class="running--container">
            <?php foreach($running as $item): ?>
                <div>
                    <span class="running--item"><?php echo $item[0]; ?></span>
                    <span class="running--item"><?php echo $item[1]; ?></span>
                    <span class="running--item"><?php echo $item[2]; ?></span>
                    <?php
                        $ts1 = strtotime(str_replace('/', '-', $item[2]));
                        $ts2 = time();
                        $diff = abs($ts1 - $ts2);
                        //$diff = gmdate("H:i:s", $diff); 
                    ?>
                    <span class="running--item counter" diff=<?php echo $diff; ?>>0:0:0</span>
                    <a href="welcome.php?id=<?php echo $item[4]?>&cmd=stop">stop</a>
                </div>
            <?php endforeach ?>
        </div>         
            <form method="POST" action="welcome.php">
                <input type="text" name="name" />
                <input type="text" name="description" />
                <button onclick="reloadFunc" type="submit" name="submit" >START</button>
            </form>
        </div>

    </div>
</body>
</html>