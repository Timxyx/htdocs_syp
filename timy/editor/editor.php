<?php 
    $btn_symbolsLow = ["1234567890","qwertzuiop", "asdfghjkl", "yxcvbnm,.-"];
    $btn_symbolsUp = ["!\§$%&/()=?","`QWERTZUIOP`", "ASDFGHJKL", "YXCVBNM;:_,./"];
    $btn_symbols = [];
    $text = '';
    $upper = false;
    
    

    if(isset($_POST['submit'])){

        $upper = filter_var($_POST['upper'], FILTER_VALIDATE_BOOLEAN);

        $btn_symbols = $upper ? $btn_symbolsUp : $btn_symbolsLow;

        if($_POST['submit'] == "explode"){
            
            $rest = mb_substr($_POST['text'], 0, -1);
            $text = $rest;
            
            
        }
        
        else{
            $text = $_POST['text'] . $_POST['submit'];
            
        } 
     print_r($upper);   
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
            <input type="hidden" name="upper" value="<?php echo $upper?>"/>
            <div>  
                <textarea readonly id="text" name="textArea" cols="35" rows="4"><?php echo $text?></textarea> 	
                <?php foreach ($btn_symbols as $btn_row): ?>
                    <div class="keys">
                        <?php for($i = 0; $i < strlen($btn_row); $i++):?>
                        <input id="" class="key" type="submit" name="submit" value="<?php echo $btn_row[$i]?>" />
                <?php endfor;?>
                </div>

            <?php endforeach;?>
            
            <input class="labels" id="space" class="key" type="submit" name="submit" value="&nbsp;" placeholder="Space"><label class="labels" for="space"><span class="textSpan" >Space</span></input>
            <input id="delete" class="key" type="submit" name="submit" value="explode" placeholder="Space"></input><label class="labels" for="space"><span class="textSpan" >Backspace</span></input>
            <input id="clear" class="key" type="submit" name="upper" value="<?php echo !$upper ?>" placeholder="Upper"></input><label class="labels" for="space"><span class="textSpan" >Caps</span></input>

            </div> 
   </div>
</form> 
</body>
</html>