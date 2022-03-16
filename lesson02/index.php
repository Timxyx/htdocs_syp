<?php
 $event = "Ferien";
 $text1 = "Sommer";
 $text2 = 'Sommer';

echo $text1 . ", " . $text2 . "<br />";
$text = "$text1 $event";
echo $text . "<br />";

$text = '$text $event';
echo $text . "<br />";

$text = "Jack and Jue";

$text3 = str_replace("J", "Bl", $text);
echo $text3 . "<br />";

$line = "1;Agg;Stefan;geb;1980";
$parts = explode(";", $line);
echo $parts[0] . " " . $parts[1] . " " . $parts[2] . " " . $parts[3];

?>