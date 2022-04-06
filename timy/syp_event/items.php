<?php
require_once './db.php';
require_once './tools.php';

if (getPara("submit") == "add"){
    echo "hallo";
    $name = getPara("name");
    $amount = getPara("amount", 0);
    $unit = getPara("unit");

    validateItem($name, $amount, $unit);
    if(count($errorMessage) == 0){
        insertItem($name, $amount, $unit);
    }
}

$items = get_items();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./style.css"/>
    <title>Document</title>
</head>
<body class="">
    

    
    <div class="container">

        <div class="top mb-5">
            <h1>Feier Liste</h1>
        </div>
        <div class="itemBox mb-10">
        <div class="errormsg">
            <?php foreach ($errorMessage as $message): ?>
                <div class="error"><?php echo $message; ?></div>
            <?php endforeach; ?>
        </div>
        <?php foreach($items as $item):?>
            
            <div class="item">

                <div><?php echo $item[1];?></div>
                <div><?php echo $item[2];?></div>
                <div><?php echo $item[3];?></div>
                <a href="#">edit</a>

            </div>
        <?php endforeach;?>
        </div>

        <form action="items.php" class="form" method="POST">
            <div class="mb-5 w-100 flex space-between"><label class="mr-3 " for="">Name:</label><input type="text" name="name" class="bg-gray-400 inputSmall"/></div>
            <div class="mb-5 w-100 flex space-between"><label class="mr-3 " for="">Amount:</label><input type="text" name="amount" class="bg-gray-400 inputSmall"/></div>
            <div class="mb-5 w-100 flex space-between"><label class="mr-3 " for="">Unit:</label><input type="text" name="unit" class="bg-gray-400 inputSmall"/></div>
            <Button type="submit" name="submit" value="add" class="bg-blue-600 px-6 py-3 rounded-full ">Speichern</Button>
        </form>
    </div>
    
</body>
</html>