<?php
require_once './db.php';
require_once './tools.php';
$id = getPara("id", 0, "GET");
$user_id = $_COOKIE['userId'];
$cmd = getPara("cmd", "", "GET");
if(!isset($_COOKIE['login'])){
    header("Location: login.php");
}
if($cmd == "add" || $cmd == "sub"){
    insertOrUpdateItem($user_id, $id, $cmd);
}

$cmd = getPara("submit");
$userId = $_COOKIE['userId'];
if ($cmd != ""){}


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
        <div class="item underline">
            <div>Beitrag</div>
            <div>Einheit</div>
            <div>offen</div>
            <div>eigen</div>
            <div>Aktion</div>

        </div>
        <?php foreach($items as $item):?>
            <div class="item">

                <div><?php echo $item[1];?></div>
                <div><?php echo $item[3];?></div>
                <div><?php echo itemsAmountLeft($item[0]);?></div>
                <div><?php echo getContribItemAmount($userId, $item[0]) ?></div>
                <a href="contribs.php?id=<?php echo $item[0]?>&cmd=add">add</a>
                <a href="contribs.php?id=<?php echo $item[0]?>&cmd=sub">sub</a>

            </div>
        <?php endforeach;?>
        </div>

       
    </div>
    
</body>
</html>