
<?php

    $event = "Ferien";
    $text1 = "Sommer";
    $text2 = 'Sommer';

    echo $text1 . "," . $text2 . "<br/>";
    $text = "$text1 $event";
    echo $text . "<br/>";

    $text = '$text $event';
    echo $text . "<br/>";

    $text = "Jack and Jue";
    $text3 = str_replace("J","Bl",$text);
    echo $text . "," . $text3 . "<br/>";
    

    $line = "1;Agg;Stefan;2AKIFT;1980";
    $parts = explode(";",$line);
    echo $parts[1] . " " . $parts[2] . ", geb.: " . $parts[4] . "<br/>";




?>