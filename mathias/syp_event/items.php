
<?php 
//needs fix

//if(!isset($_COOKIE['login'])) 
    //header("Location: ../login_exercise/login.php");
    

echo $_COOKIE['login'];
require_once './dbTools.php';
require_once './tools.php';

//GET PARAMETERS
$id = getPara("id", 0, "GET");
$cmd = getPara("cmd", "", "GET");
if ($cmd == "delete") {
    deleteItem($id);
    $id = 0;
}

//POST PARAMETERS
$cmd = getPara("submit");
if ($cmd != "") {
    $name = getPara("name");
    $amount = getPara("amount",0);
    $unit = getPara("unit");
    validateItem($name,$amount,$unit);
    if (count($errormsgs) == 0) {
        if ($cmd == "add") 
            insertOrUpdateItem($name,$amount,$unit);
        else if ($cmd == "save") {
            saveItem(getPara("id"),$name, $amount, $unit);
        }
    }
}
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
            <div id="errormsgs">
                <?php foreach ($errormsgs as $msg) : ?>
                    <div class="errorMessage"> <?php echo $msg; ?> </div>
                    <?php endforeach; ?>
            </div>
            <?php foreach ($items as $item): ?>
                <?php if ($item[0] == $id) $edItem = $item;?>          
                <div class="item">
                    <div class="itemCol1"><?php echo $item[1]?></div>
                    <div class="itemCol2"><?php echo $item[2]?></div>
                    <div class="itemCol3"><?php echo $item[3]?></div>
                    <div class="itemCol4">
                    <a id="edit" href="items.php?id=<?php echo $item[0] ?>&cmd=edit">edit</a>
                    <a href="items.php?id=<?php echo $item[0] ?>&cmd=delete">delete</a>
                    </div>  
                </div>
                <?php endforeach; ?>
            <form action="items.php" method="POST" class="bg-gray-800 p-5">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <div class="item">
                    <div class="itemCol1">
                        <input class="big" type="text" name="name" value="<?php echo @$edItem[1] ?>"/>
                    </div>
                    <div class="itemCol2">
                        <input class="small" type="text" name="amount" value="<?php echo @$edItem[2] ?>"/>
                    </div>
                    <div class="itemCol3">
                        <input class="small" type="text" name="unit" value="<?php echo @$edItem[3] ?>"/>
                    </div>  
                    <div class="itemCol4">
                        <?php $btnText = ($id == 0) ? "add" : "save" ?>
                        <input class="medium" type="submit" name="submit" value="<?php echo $btnText ?>"/>
            
                    </div>  
                </div>
            </form>
        </div>
    <div id="bottom">
        designed by 2AKIFT
    </div>
</body>
</html>