
<?php

$btnSymbols = ["1234567890","qwertzuiop","asdfghjkl","yxcvbnm,.-"];
$text = '';



if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "upper") {
        if ($btnSymbols == ["1234567890","qwertzuiop","asdfghjkl","yxcvbnm,.-"])    // this doesnt work bcs line 4 überschreibt deis
            $btnSymbols = ["1234567890","QWERTZUIOP","ASDFGHJKL","YXCVBNM,.-"];
        else
            $btnSymbols = ["1234567890","qwertzuiop","asdfghjkl","yxcvbnm,.-"];
    }
    
    if ($_POST['submit'] == "delete") {
        $text = mb_substr($_POST['text'], 0, -1);
    } else
        $text = $_POST['text'] . $_POST['submit'];
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
            <textarea readonly id="text" name="area" cols="35" rows="4" ><?php echo $text?></textarea>
            <div id="editor">
                <?php foreach($btnSymbols as $btnRow): ?>
                    <?php for ($i = 0; $i<strlen($btnRow); $i++):?>
                        <input type="submit" name="submit" class="item" value="<?php echo $btnRow[$i]?>" />
                    <?php endfor;?>
                <?php          endforeach;?>                
            </div>
            <input type="submit" name="submit" class="item" value="&nbsp;" />
            <input type="submit" name="submit" class="item" value="delete" />
            <input type="submit" name="clear" class="item" value="clear" />
            <input type="submit" name="upper" class="item" value="upper" />
        </div>
    </form>
</body>
</html>