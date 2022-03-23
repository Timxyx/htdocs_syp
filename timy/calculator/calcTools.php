<?php

$stateInx = 0;
$result = 0;
$operand1 = 0;
$rechenzeichen = "undefined Dude";

    function isDigit($c){
        return strpos('1234567890',$c) === false ? false : true;
    }
    function isArithm($c){
        return strpos('+-*/',$c) >= 0 ? True : False;
    }

    function check_state($stateInx, $op){
        isDigit($op);
        $states = ["op1_start", "op1", "op2_start", "op2", "finished", "error"];

        if($stateInx == 0 && isDigit($op) 
                || ($stateInx == 1 && (isArithm($op) || isDigit($op)))
                || ($stateInx == 2 && isDigit($op))
                || ($stateInx == 3 && (isDigit($op) || $op == "="))
                || $op == 'C'){
                    return true;
                }
            
            
        return false;
    }

    function calculate($rechenzeichen, $operand1, $op2){
        if($rechenzeichen == "+"){
            return $operand1 + $op2;
        }
        else if($rechenzeichen == "-"){
            return $operand1 - $op2;
        }
        else if($rechenzeichen == "*"){
            return $operand1 * $op2;
        }
        else if($rechenzeichen == "/"){
            return $operand1 / $op2;
        }
        
    }

    function handleButton(){
        
    if (isset($_POST['submit'])){
        global $stateInx, $result, $operand1, $rechenzeichen; 

        $stateInx = $_POST['stateInx'];
        $op = $_POST['submit'];
        $result = $_POST['result'];
        $operand1 = $_POST['operand1'];
        $rechenzeichen = $_POST['rechenzeichen'];


        if(check_state($stateInx, $op) == false){
            $stateInx == 5;
            $result = 'Error';
        } 
        else if($op == "C"){
            $stateInx = 0;
            $result = 0;
            $operand1 = 0;
            $rechenzeichen = "undefined Dude";
        }
        else if(($stateInx == 0 && check_state($stateInx, $op))){
            $stateInx = 1;
            $result = $op;
        }
        else if($stateInx == 1){
            if(isDigit($op)){
                $result = $result * 10;
                $result += $op; 
            }
            else{
                $operand1 = $result;
                $rechenzeichen = $op;
                $result = 0;
                $stateInx = 2;
            }
            
        }
        else if($stateInx == 2){
            if(isDigit($op)){
                $result = $op; 
                $stateInx = 3;
            }
            else{
                $stateInx = 5;
            }
            
        }
        else if($stateInx == 3 && check_state($stateInx, $op)){
            if(isDigit($op)){
                $result = $result * 10;
                $result += $op;
                 
            }
            else{
                $result = calculate($rechenzeichen, $operand1, $result);
                $stateInx = 4;
            }
        }
    }
}

?>