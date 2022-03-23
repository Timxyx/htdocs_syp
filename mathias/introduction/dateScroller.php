

<?php
$diff = 0;
if (isset($_GET['diff'])) { //$_GET beinhaltet alle GET Parameter, sammelt diese in array
    $diff = $_GET['diff'];
}
$date = date("d.m.Y", time()+ $diff * 24 * 60 * 60);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>date scroller</title>
    <link rel="stylesheet" href="../css/dateScroller.css"/>
</head>
<body>
    <p>
        <!--<?php echo "jetzt: " . time(); ?>-->
    </p>
    <div id ="top">
        <span <a id = "heute" href="DateScroller.php?diff=<?php echo 0?>">heute;</a> </span>
        <br/>
        <a class = "btn" href="DateScroller.php?diff=<?php echo $diff-1?>">&lt;</a>

        <?php echo $date; ?>
        <a class = "btn" href="DateScroller.php?diff=<?php echo $diff+1?>">&gt;</a>

    </div>
</body>
</html>