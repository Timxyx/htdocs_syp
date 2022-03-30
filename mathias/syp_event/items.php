
<?php 
require_once './dbTools.php';

$items = getItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="stylesheet" href="../css/items.css" />
</head>
<body>
    <div id="top">
        </h2>Jahresabschlussfeier 01.07.2022</h2>
    </div>
        <div id="content">
            <?php foreach ($items as $item): ?>
                <?php //print_r($item) ?>
                <div class="item">
                    <div class="itemCol1"><?php echo $item[1]?></div>
                    <div class="itemCol2"><?php echo $item[2]?></div>
                    <div class="itemCol3"><?php echo $item[3]?></div>
                    <div class="itemCol4">
                        <a href="#">edit</a>
                    </div>  
                </div>
                <?php endforeach; ?>
            <form action="items.php" method="POST" class="bg-gray-800 p-5"> 
                <div class="item">
                    <div class="itemCol1">
                        <input class="big" type="text" name="name"/>
                    </div>
                    <div class="itemCol2">
                        <input class="small" type="text" name="amount"/>
                    </div>
                    <div class="itemCol3">
                        <input class="small" type="text" name="unit"/>
                    </div>  
                    <div class="itemCol4">
                        <input class="small" type="submit" name="submit" value="add"/>
                    </div>  
                </div>
            
            <input type="hidden" name="text" value="<?php echo $text?>"/>
            <input type="hidden" name="mode" value="<?php echo $mode?>"/>
        </div>
    <div id="bottom">
        designed by 2AKIFT
    </div>
</body>
</html>