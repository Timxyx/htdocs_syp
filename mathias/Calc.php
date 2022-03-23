


<?php
require_once 'calcFunctions.php';


print_r($_POST);

handleButtonclicks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calc</title>
    <link rel="stylesheet" href="css/Calc.css"/>
</head>
<body>

<div id ="top">
    <h2>the best calculator in hauah web</h2>
</div>

<form action="Calc.php" method="POST">
    <input type="hidden" name="stateInx" value="<?php echo $stateInx ?>" />
    <input type="hidden" name="value" value="<?php echo $value ?>" />
    <input type="hidden" name="op1" value="<?php echo $op1 ?>" />
    <input type="hidden" name="operator" value="<?php echo $operator ?>" />
        <div id ="calc">
            <input type="text" class="fullWidth" value = "<?php echo $value; ?>"/>
            <?php foreach($btnSymbols as $btnRow): ?>
                <?php for ($i = 0; $i<strlen($btnRow); $i++):?>
                    <input type="submit" name="submit" class="item" value="<?php echo $btnRow[$i]?>" />
                <?php endfor;?>
            <?php          endforeach;?>
        </div>
</form>

    <div id ="bottom">
        <h3> designed by Schuh des Manitou </h3>
    </div>


    </body>
</html>