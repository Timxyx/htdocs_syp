<?php
    $result = 0;
    if (isset($_POST['first']) && isset($_POST['second'])){
        if($_POST['operand'] == '+'){
            $result = $_POST['first'] + $_POST['second'];
            $plusActive = 'selected';
        }
        else if($_POST['operand'] == '-'){
            $result = $_POST['first'] - $_POST['second'];
            $minusActive = 'selected';
        }
        else if($_POST['operand'] == '/'){
            $result = $_POST['first'] / $_POST['second'];
            $divActive = 'selected';
        }
        else if($_POST['operand'] == '*'){
            $result = $_POST['first'] * $_POST['second'];
            $mulActive = 'selected';
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
        <form method="POST" id='calcform' action="advancedCalc.php?">
            <input name="first" 
                value="<?php if 
                    ((isset($_POST['first']))){
                        echo $_POST['first'];} 
                ?>" 
                class="small" 
                type="number" />
            <select name='operand' form='calcform'>
                <option <?php echo @$plusActive  ?> value="+">+</option>
                <option <?php echo @$minusActive  ?> value="-">-</option>
                <option <?php echo @$divActive  ?> value="/">/</option>
                <option <?php echo @$mulActive  ?> value="*">*</option>
            </select>
            <input name="second" 
                value="<?php if 
                    ((isset($_POST['second']))){
                        echo $_POST['second'];} 
                        ?>" 
                class="small" 
                type="number" />
            <input type="submit" value="calculate" name="calculate" />
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