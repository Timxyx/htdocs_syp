
<?php

$btnSymbols = ["1234567890","qwertzuiop","asdfghjkl","yxcvbnm,.-"];
$text = '';
$mode = "down";



if (isset($_POST['submit'])) {
    $text = $_POST['text'] . $_POST['submit'];
    $op = $_REQUEST['op'];
    
    /*if ($_POST['submit'] == "delete") {
        $text = mb_substr($_POST['text'], 0, -1); */
    if ($op == 'back') {
        $text = mb_substr($text, 0, -1);
    } else if ($op == 'space') {
        $text .= ' ';
    } else if ($op == 'clear') {
        $text = "";
    } else if ($op == 'up' || "down") {
        $mode = $op;
    } else {
        $text .= $REQUEST['submitLetter'];
    }
        
}
print_r($_POST);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link rel="stylesheet" href="../css/editor.css"/>
</head>
<body>
    <div id="top">
            <h2>Editor</h2>
    </div>
    <form action="editor.php" method="post"> 
        <div id="content">
            <input type="hidden" name="text" value="<?php echo $text?>"/>
            <input type="hidden" name="text" value="<?php echo $mode?>"/>
            <?php $startLetter = ($mode == "down") ? 'a' : 'A' ?>
            <?php for ($i = 0, $letter = $startLetter; $i < 26; $i++,$letter++): ?>
                <input type="submit" name="submLetter" value="<?php echo $$letter ?>" />
            <?php endfor; ?>
            <textarea readonly id="text" name="area" cols="35" rows="4" ><?php echo $text?></textarea>
            <div id="editor">
                <?php foreach($btnSymbols as $btnRow): ?>
                    <?php for ($i = 0; $i<strlen($btnRow); $i++):?>
                        <input type="submit" name="submit" class="item" value="<?php echo $btnRow[$i]?>" />
                    <?php endfor;?>
                <?php          endforeach;?>                
            </div>
                <input type="submit" name="submLetter" class="item" value="space" />
                <input type="submit" name="submLetter" class="item" value="back" />
                <input type="submit" name="submLetter" class="item" value="upper" />
            </div>
    </form>
</body>
</html>