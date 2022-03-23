

<!-- Aufgabe: + - * implementieren -->


<?php

$result = 0;
$op1 = 0;
$op2 = 0;

print_r($_POST);


if (isset($_POST['submit'])){
    $op1 = $_POST['op1'];
    $op2 = $_POST['op2'];

    if ($_POST['operand'] == '+'){
        $result = $_POST['op1'] + $_POST['op2'];
    }
    if ($_POST['operand'] == '-'){
        $result = $_POST['op1'] - $_POST['op2'];
    }
    if ($_POST['operand'] == '*'){
        $result = $_POST['op1'] * $_POST['op2'];
    }
    if ($_POST['operand'] == '/'){
        $result = $_POST['op1'] / $_POST['op2'];
    }
    if ($_POST['operand'] == '%'){
        $result = $_POST['op1'] % $_POST['op2'];
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>advanced Calculator</title>
    <link rel="stylesheet" href="../css/simpleCalc.css"/>
</head>
<body>

    <div id ="top">
        <h2> ==== Advanced Calculator ==== </h2>
    </div>
    <div id ="content">
        
        <form action="advancedCalc.php" method="POST">
        
            <input type="number" class = "small" name="op1" value="<?php echo $op1 ?>"/>

            <select name="operand" type="calcform">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
                <option value="%">%</option>
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