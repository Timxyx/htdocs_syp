<?php


$text = $_REQUEST['text'];


echo preg_match("/^[a-zA-Z] {2,2} [a-zA-Z0-9 ] {2,6}$/",$text);

?>