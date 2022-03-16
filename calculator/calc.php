<?php
    require_once './calcTools.php';

    $btn_symbols = ["123+", "456-", "789*","0=C/"];
    $states = ["op1_start", "op1", "op2_start", "op2", "finished", "error"];
    $stateInx = 0;
    $result = 0;

    if (isset($_POST['submit'])){
        $stateInx = $_POST['stateInx'];
        $op = $_POST['submit'];
        if(check_state($stateInx, $op))

        if($_POST['operand'] == '+'){
            $result = $_POST['first'] + $_POST['second'];
        }
        else if($_POST['operand'] == '-'){
            $result = $_POST['first'] - $_POST['second'];
        }
        else if($_POST['operand'] == '/'){
            $result = $_POST['first'] / $_POST['second'];
        }
        else if($_POST['operand'] == '*'){
            $result = $_POST['first'] * $_POST['second'];
        }
    }
    
?>
<html>
    <head>
        <title>Calculator++</title>
        <link rel="stylesheet" href="./mystyle.css"/>
    </head>
    <body>
    <div class="box">
        <form class="container" action="calc.php" method="post">
            <input type="hidden" name="stateInx" value="<?php echo $stateInx?>"/>
        <input type="text" class="fullWidth" value="<?php echo $result ?>"/>
            <?php foreach ($btn_symbols as $btn_row): ?>
                
                <?php for($i = 0; $i < strlen($btn_row); $i++):?>
                    <input id="" class="item" type="submit" name="submit" value="<?php echo $btn_row[$i]?>" />
                <?php endfor;?>

            <?php endforeach;?>
        </form>
    </div>
    </body>
</html>