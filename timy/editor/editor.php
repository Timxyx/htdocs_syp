<?php 
    $btn_symbols = ["1234567890","qwertzuiop", "asdfghjkl", "yxcvbnm,.-"];
    $text = '';

    if(isset($_POST['submit'])){
        
        $text = $_POST['text'] . $_POST['submit'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./style.css"/>
    <title>simple editor</title>
</head>
<body>
    <div class="container min-w-full flex justify-center">
        <form action="editor.php" method="POST" class="bg-gray-800 p-5"> 
            <input type="hidden" name="text" value="<?php echo $text?>"/>
            <div>  
                <textarea readonly id="text" name="textArea" cols="35" rows="4"><?php echo $text?></textarea> 	
                <?php foreach ($btn_symbols as $btn_row): ?>
                    <div class="keys">
                        <?php for($i = 0; $i < strlen($btn_row); $i++):?>
                        <input id="" class="key" type="submit" name="submit" value="<?php echo $btn_row[$i]?>" />
                <?php endfor;?>
                </div>

            <?php endforeach;?>
            <input id="space" class="key" type="submit" name="submit" value="&nbsp;" placeholder="Space"></input>
            <input id="delete" class="key" type="submit" name="submit" value="&nbsp;" placeholder="Space"></input>
            <input id="clear" class="key" type="submit" name="submit" value="&nbsp;" placeholder="Space"></input>

            </div> 
   </div>
</form> 
</body>
</html>