<?php
require_once './db.php';
require_once './tools.php';
$id = getPara("id", 0, "GET");
$cmd = getPara("cmd", "", "GET");
if(!isset($_COOKIE['login'])){
    header("Location: login.php");
}
if($cmd == "del"){
    deleteItem($id);
    $id = 0;
}

$cmd = getPara("submit");

if ($cmd != ""){
    $name = getPara("name");
    $amount = getPara("amount", 0);
    $unit = getPara("unit");
    
    validateItem($name, $amount, $unit);
    if(count($errorMessage) == 0){
        if($cmd == "add"){
            insertItem($name, $amount, $unit);
        }
        else if($cmd == "save"){
            saveItem($name, $amount, $unit, getPara("id"));
            
        }      
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
        <?php if ($item[0] == $id) $editItem = $item?>
            <div class="item">

                <div><?php echo $item[1];?></div>
                <div><?php echo $item[2];?></div>
                <div><?php echo $item[3];?></div>
                <a href="items.php?id=<?php echo $item[0]?>&cmd=ed">edit</a>
                <a href="items.php?id=<?php echo $item[0]?>&cmd=del">delete</a>

            </div>
        <?php endforeach;?>
        </div>

        <form action="items.php" class="form" method="POST">
            <input type="hidden" name="id" value="<?php echo $id?>"/>
            <div class="mb-5 w-100 flex space-between">
                <label class="mr-3 " for="">Name:</label>
                <input 
                    value="<?php echo @$editItem[1]?>" 
                    type="text" 
                    name="name" 
                    class="bg-gray-400 inputSmall"/>
                </div>

            <div class="mb-5 w-100 flex space-between">
                <label class="mr-3 " for="">Amount:</label>
                <input 
                    value="<?php echo @$editItem[2]?>" 
                    type="text" 
                    name="amount" 
                    class="bg-gray-400 inputSmall"/>
                </div>

            <div class="mb-5 w-100 flex space-between">
                <label class="mr-3 " for="">Unit:</label>
                <input 
                    value="<?php echo @$editItem[3]?>" 
                    type="text" 
                    name="unit" 
                    class="bg-gray-400 inputSmall"/>
                </div>
            <?php $btnTxt = ($id == 0) ? "add" : "save"; ?>
            <Button type="submit" name="submit" value=<?php echo $btnTxt; ?> class="bg-blue-600 px-6 py-3 rounded-full "><?php echo $btnTxt; ?></Button>
        </form>
    </div>
    
</body>
</html>