
<?php 

require_once './tools.php';
require_once '../login_exercise/dbtools.php';

//GET PARAMETERS
$id = getPara("id", 0, "GET");
$cmd = getPara("cmd", "", "GET");

$userId = 2;   // cookie geht ned

if ($cmd == "add") {
    insertOrUpdateContribs($userId,$id);
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
                <div class="item underline">
                        <div class="itemCol1">Beitrag</div>
                        <div class="itemCol2">Einheit</div>
                        <div class="itemCol3">offen</div>
                        <div class="itemCol3">eigen</div>
                        <div class="itemCol">Aktion</div>
                        <?php foreach ($items as $item): ?>       
                            <div class="item">
                                <div class="itemCol1"><?php echo $item[1]?></div>
                                <div class="itemCol2"><?php echo $item[3]?></div>
                                <div class="itemCol3"><?php echo itemAmountLeft($item[0])?></div>
                                <div class="itemCol3"><?php echo getContribItemAmount($userId,$item[0])?></div>
                                <div class="itemCol4">
                                    <a href="contribs.php?id=<?php echo $item[0] ?>&cmd=add">add</a>
                                    <a href="contribs.php?id=<?php echo $item[0] ?>&cmd=sub">sub</a> 
                                </div>
                        <?php endforeach; ?>  
                            </div>
                </div>
            </div>
        </div>
<div id="bottom">
    designed by 2AKIFT
</div>
</body>
</html>