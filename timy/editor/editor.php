<?php 
    $btn_symbolsLow = ["1234567890","qwertzuiop", "asdfghjkl", "yxcvbnm,.-"];
    $btn_symbolsUp = ["!%&/()=?","`QWERTZUIOP`", "ASDFGHJKL", "YXCVBNM;:_"];
    $text = '';
    $mode = 'down';

    
    

    if(isset($_POST['submit'])){
        $mode = $_POST['mode'];
        if($_POST['submit'] == "explode"){
            
            $rest = mb_substr($_POST['text'], 0, -1);
            $text = $rest;
            
            
        }
        else if($_POST['submit'] == "clear"){
            $text = "";
        }
        else if($_POST['submit'] == "up" || $_POST['submit'] == "down"){
            $mode = $_POST['submit'];
            $text = $_POST['text'];
        }
        
        
        else{
            $text = $_POST['text'] . $_POST['submit'];
            
        }


 
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
            <input type="hidden" name="mode" value="<?php echo $mode?>"/>
            <div>
                <textarea readonly id="text" name="textArea" cols="40" rows="4"><?php echo $text?></textarea> 	
                <?php foreach ($mode == 'up' ? $btn_symbolsUp : $btn_symbolsLow as $btn_row): ?>
                    <div class="keys">
                        <?php for($i = 0; $i < strlen($btn_row); $i++):?>
                        <input id="" class="key" type="submit" name="submit" value="<?php echo $btn_row[$i]?>" />
                <?php endfor;?>
                </div>

            <?php endforeach;?>
            <div class="flex flex-rows w-full space-between">
                <input class="special bg-white" type="submit" name="submit" value="&nbsp;" placeholder=""><span class="textSpan" >Space</span></input>
                <input class="special bg-white" type="submit" name="submit" value="explode" placeholder=""></input><span class="textSpan" >Backspace</span></input>
                <input class="special bg-white" type="submit" name="submit" value="<?php echo $mode == 'up' ? 'down' : 'up' ?>" placeholder=""></input><span class="textSpan" >Caps</span></input>
                <input class="special bg-white" type="submit" name="clear" value="" placeholder=""></input><span class="textSpan" >Clear</span></input>

            </div>
            </div> 
   </div>
</form> 
</body>
</html>