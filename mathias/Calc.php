



<!-- Aufgabe: + - * implementieren -->


<?php
require_once 'calcFunctions.php';

$btnSymbols = ["012+","345-","678*","c9=/"];
$states = ["op1_start", "op1", "op2_start", "op2", "finished", "error"];
$stateInx = 0;
$result = 0;
$op1 = 0;
$op2 = 0;
$value = 0;
$operator = "undefined";

print_r($_POST);


if (isset($_POST['submit'])){
    $stateInx = $_POST['stateInx'];
    $op = $_POST['submit'];
    $value = $_POST['value'];
    $op1 = $_POST['op1'];
    $operator = $_POST['operator'];

    if (checkState($stateInx, $op) == False){
        $stateInx = 5;
        $value = "Error";
    } else if ($stateInx == 0) {
        $stateInx = 1;
        $value = $op;
    } else if ($stateInx == 1) {
        if (isDigit($op)) {
            $value = $value * 10 + $op;
        }
        else {
            $op1 = $value                   // left operand
            $operator = $op;
            $stateInx = 2;
        }    
    } else if ($stateInx == 2) {
        
    }
/*
    $op1 = $_POST['op1'];
    $op2 = $_POST['op2'];

    switch ($op){
        case '+': $result = $op1 + $op2;
            $plusActive = 'selected';
            break;
        case '-': $result = $op1 - $op2;
            $minActive = 'selected';
            break;
        case '*': $result = $op1 * $op2;
            $mulActive = 'selected';
            break;
        case '/': $result = $op1 / $op2;
            $divActive = 'selected';
            break;
        case '%': $result = $op1 % $op2;
            $modActive = 'selected';
            break;
    }
*/
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calc</title>
    <link rel="stylesheet" href="css/Calc.css"/>
</head>
<body>

<div id ="top">
    <h2>the best calculator in the web</h2>
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