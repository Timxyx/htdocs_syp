<?php
    $text = $_REQUEST['text'];

    echo preg_match("/^[A-Za-z]{2,2}[A-Za-z0-9]{2,6}$/", $text);
?>