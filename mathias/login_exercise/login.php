
<?php 
require_once './dbtools.php';
require_once '../syp_event/tools.php';

$user = getPara("user");
$pwd = getPara("pwd");
if($user != "" && $pwd != "") {
    if(checkUser($user, $pwd)) {
        setcookie("login","ok", time() + 60 * 15);  // cookie für 15min gültig
        header("Location: http://localhost/mathias/syp_event/items.php");
    }
    else
        $errormsgs[] = "inkorrekte anwenderdaten";
}

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
            <form action="login.php" method="POST" class="loginForm">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <div class="item">
                    <div class="itemCol1">
                        Anwender
                    </div>
                    <div class="itemCol1">
                        <input class="medium" type="text" name="user" />
                    </div>
                    <div class="itemCol1">
                        Kennwort
                    </div>
                    <div class="itemCol1">
                        <input class="medium" type="password" name="pwd" />
                    </div>
                    <div class="itemCol1">

                    </div>
                    <div class="itemCol1">
                        <input class="medium" type="submit" name="submit" value="anmelden" />
                    </div>
                </div>
            </form>
        </div>
    <div id="bottom">
        designed by 2AKIFT
    </div>
</body>
</html>