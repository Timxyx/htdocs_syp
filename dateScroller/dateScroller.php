<?php
    $diff = 0;
    if (isset($_GET['diff']))  //$_GET ... beinhaltet alle GET Parameter
        $diff = $_GET['diff'];

    $date = date("d.m.Y", time() + $diff * 60*60*24);
?>
<html>
    <head>
        <title>DateScroller</title>
        <link rel="stylesheet" href="./mystyle.css"/>
    </head>
    <body>
        <div class="container">
        <a class="heute" href="dateScroller.php?diff=<?php echo 0 ?>">heute</a>
        
        
        <div id="top">
            <a class="btn" href="dateScroller.php?diff=<?php echo $diff-1 ?>">&lt;</a>
                <?php
                    echo $date;
                ?>
            <a class="btn" href="dateScroller.php?diff=<?php echo $diff+1 ?>">&gt;</a>
            </div>    
        </div>
    </body>
</html>