<?php
$errorMessage = [];

    function getPara($name, $defaultValue = "", $command = "POST"){
        $filterType = ($command == "POST") ? INPUT_POST : INPUT_GET;
        if(isset($_REQUEST[$name])){
            return filter_input($filterType, $name, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $defaultValue;
    }

function validateItem($itemName, $amount, $unit){
    global $errorMessage;
    $errorMessage = [];
    if(!validateItemName($itemName)){
        $errorMessage[] = "Invalid Name: $itemName";

    }
    if(!validateAmount($amount)){
        $errorMessage[] = "Invalid Amount: $amount";

    }
    if(!validateUnit($unit)){
        $errorMessage[] = "Invalid Unit: $unit";

    }
    print_r($errorMessage);
}


function validateItemName($itemName){
    return preg_match("/^[A-Za-z]{2,2}[A-Za-z0-9]{1,6}$/", $itemName);
}
function validateAmount($amount){
    return $amount > 0 && $amount < 100 && is_numeric($amount) ? True : False;
}
function validateUnit($unit){
    return preg_match("/^[A-Za-z\.]{1,8}$/", $unit);
}
?>