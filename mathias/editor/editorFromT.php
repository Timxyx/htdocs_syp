<?php 
    //print_r($_REQUEST);
    $text = "";
    $mode = "down";
     
    if (@isset($_REQUEST['submLetter'])) {
        $op = $_REQUEST['submLetter'];
        $text = $_REQUEST['text'];          //hidden
        $mode = $_REQUEST['mode'];          //hidden

        if ($op == 'back')
            $text = substr ($text, 0, strlen($text)-1);
        else if ($op == 'space')
            $text .= ' ';
        else if ($op == 'clear')
            $text = "";
        else if ($op == "up" || $op == "down") 
            $mode = $op;       
        else
            $text .= $_REQUEST['submLetter'];
    }
?>


<html>
    <head>
        <link rel="stylesheet" href="css/simpleEditor.css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="top"> 

            </div>
            <div id="main">
                <div id="buttons">
                    <form action="simpleEditor.php" method="POST">
                        <input type="hidden" name="text" value="<?php echo $text ?>" />
                        <input type="hidden" name="mode" value="<?php echo $mode ?>" />          
                        <?php $startLetter = ($mode == "down") ? 'a' : 'A' ?>
                        <?php for ($i = 0, $letter = $startLetter; $i < 26; $i++, $letter++): ?>
                            <input type="submit" name="submLetter" value="<?php echo $letter ?>" />          
                        <?php endfor; ?>
                        <br/>
                        <input type="submit" name="submLetter" value="space" />
                        <input type="submit" name="submLetter" value="back" />
                        <input type="submit" name="submLetter" value="clear" />
                        <input type="submit" name="submLetter" 
                               value="<?php echo $mode == "up" ? "down":"up" ?>" />
                    </form>
                </div>
                <div id="edText">
                    <?php echo $text ?>
                </div>
            </div>
            <div id="footer">

            </div>
        </div>

    </body>
</html>

