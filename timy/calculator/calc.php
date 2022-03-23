<?php
    require_once './calcTools.php';

    $btn_symbols = ["123+", "456-", "789*","0=C/"];
    $states = ["op1_start", "op1", "op2_start", "op2", "finished", "error"];
    
    handleButton();

        
        /*

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
        */
    
    
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
            <input type="hidden" name="result" value="<?php echo $result?>"/>
            <input type="hidden" name="operand1" value="<?php echo $operand1?>"/>
            <input type="hidden" name="rechenzeichen" value="<?php echo $rechenzeichen ?>" />

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