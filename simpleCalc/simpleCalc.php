<?php
    $result = 0;
    if (isset($_POST['first']) && isset($_POST['second'])){
        if($_POST['operand'] == '+'){
            $result = $_POST['first'] + $_POST['second'];
            $plusActive = "active";
        }
        else if($_POST['operand'] == '-'){
            $result = $_POST['first'] - $_POST['second'];
            $minusActive = "active";
        }
        else if($_POST['operand'] == '/'){
            $result = $_POST['first'] / $_POST['second'];
            $divActive = "active";
        }
        else if($_POST['operand'] == '*'){
            $result = $_POST['first'] * $_POST['second'];
            $mulActive = "active";
        }
    }
    
?>
<html>
    <head>
        <title>Calculator</title>
        <link rel="stylesheet" href="./mystyle.css"/>
    </head>
    <body>
    <div class="container">
        <div class="top">
            Advanced Calculator
        </div>
        <div class="content">
        <form method="POST" id='calcform' action="simpleCalc.php?">
            <input name="first" 
                value="<?php if 
                    ((isset($_POST['first']))){
                        echo $_POST['first'];} 
                ?>" 
                class="small" 
                type="number" />
            <input class="<?php echo @$plusActive  ?> .operands" type="submit" value="+" name="operand" />
            <input class="<?php echo @$minusActive ?> .operands" type="submit" value="-" name="operand" />
            <input class="<?php echo @$divActive  ?> .operands" type="submit" value="/" name="operand" />
            <input class="<?php echo @$mulActive ?> .operands" type="submit" value="*" name="operand" />


            <input name="second" 
                value="<?php if 
                    ((isset($_POST['second']))){
                        echo $_POST['second'];} 
                        ?>" 
                class="small" 
                type="number" />
            <span> = </span>
            <?php
                echo $result;
            ?>
        </form>
        </div>
        <div class="bottom">
            <p>Designed by 2AKIFT</p>
        </div>
    </div>
    </body>
</html>