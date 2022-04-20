
<?php
$errormsgs = [];

function getPara($name, $defaultValue = "", $command = "POST") {
    $filterType = ($command == "POST") ? INPUT_POST : INPUT_GET;
    if(@isset($_REQUEST[$name])) 
        return filter_input($filterType, $name, FILTER_SANITIZE_SPECIAL_CHARS);
    return $defaultValue;
}

function validateItem ($itemName,$amount,$unit) {
    global $errormsgs;
    $errormsgs = [];
    if (!validateItemName($itemName))
        $errormsgs[] = "Invalid item name: $itemName";
    if (!validateAmount($amount))
        $errormsgs[] = "Invalid amount: $amount";
    if (!validateUnit($unit))
        $errormsgs[] = "Invalid unit: $unit";
}

function validateItemName($itemName) {
    return preg_match("/^[a-zA-Z]{2,2}[a-zA-Z0-9]{1,6}$/",$itemName);
}

function validateAmount($amount) {
    return is_numeric($amount) > 0 && $amount < 100 ? true : false;
}

function validateUnit($unit) {
    return preg_match("/^[a-zA-Z\.]{1,8}$/",$unit);
}

?>