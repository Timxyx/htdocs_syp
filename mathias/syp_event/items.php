
<?php 
require_once './dbTools.php';
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
            <form action="items.php" method="POST" class="bg-gray-800 p-5"> 
            <input type="hidden" name="text" value="<?php echo $text?>"/>
            <input type="hidden" name="mode" value="<?php echo $mode?>"/>
        </div>
    <div id="bottom">
        designed by 2AKIFT
    </div>
</body>
</html>