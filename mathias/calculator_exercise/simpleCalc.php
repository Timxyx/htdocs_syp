

<!-- Aufgabe: + - * implementieren -->


<?php

$result = 0;
$op1 = 0;
$op2 = 0;

print_r($_POST);


if (isset($_POST['submit'])){
    $op = $_POST['op'];
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>simple Calculator</title>
    <link rel="stylesheet" href="css/simpleCalc.css"/>
</head>
<body>

    <div id ="top">
        <h2> simple Calc </h2>
        </div>
    <div id ="content">
        
        <form action="simpleCalc.php" method="POST">
        
            <input type="number" class = "small" name="op1" value="<?php echo $op1 ?>"/>

            <select name="op">
                <option <?php echo @$plusActive?>>+</option>
                <option <?php echo @$minActive?>>-</option>
                <option <?php echo @$mulActive?>>*</option>
                <option <?php echo @$divActive?>>/</option>
                <option <?php echo @$modActive?>>%</option>
            </select>

            <input type="number" class = "small" name="op2" value="<?php echo $op2 ?>"/>
            <input type="submit" class = "small" name="submit" value="="/>
            
            <?php echo $result; ?>

        </form>


    </div>
    <div id ="bottom">
        <h3> designed by 2AKIFT </h3>
    </div>


</body>
</html>