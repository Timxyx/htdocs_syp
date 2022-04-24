<?php
    @session_start();
    include("auth.php");
    require_once './dbTools.php';

    $history = getHistory($_SESSION['username']);
    $running = getRunning($_SESSION['username']);
    

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
            <div>
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
        </div>
        <?php endforeach ?>
        <br /><br />
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
                        $diff = gmdate("H:i:s", $diff); 
                    ?>
                    <span class="running--item counter"><?php echo $diff; ?></span>
                </div>
            <?php endforeach ?>
        </div>         
        <div class="active--item">here<span id="stopwatch">0</span><button onclick="startWatch()">PlayButton</button> </div>
            <form method="POST" action="welcome.php">
                <input type="text" name="name" />
                <input type="text" name="description" />
                <button type="submit" name="submit" >START</button>
            </form>
        </div>

    </div>
</body>
</html>