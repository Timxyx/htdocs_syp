

<?php
    $btnSymbols = ["012+","345-","678*","c9=/"];
    $states = ["op1_start", "op1", "op2_start", "op2", "finished", "error"];

    const OP1_START = 0;
    const OP1 = 1;
    const OP2_START = 2;
    const OP2 = 3;
    const FINISHED = 4;
    const ERROR = 5;

    $stateInx = 0;
    $result = 0;
    $op1 = 0;
    $op2 = 0;
    $value = 0;
    $operator = "?";

    function isDigit($c){
        return strpos("0123456789", $c) === false ? false : true;
    }

    function isArithm($c){
        return strpos("+-*/", $c) >= 0 ? True : False;
    }

    function checkState ($stateInx, $op){
        $states = ["op1_start", "op1", "op2_start", "op2", "finished", "error"];

        if ($stateInx == 0 && isDigit($op)
                || ($stateInx == 1 && (isArithm($op) || isDigit($op)))
                || ($stateInx == 2 && isDigit($op))
                || ($stateInx == 3 && (isDigit($op) || $op == '='))
                || ($stateInx == 4)
                || ($stateInx == 5)
                || ($op == 'c'))
            return true;
        return false;
    }

    function calc ($operator, $op1, $op2) {
        switch ($operator) {
            case '+': return $op1 + $op2;
            case '-': return $op1 - $op2;
            case '*': return $op1 * $op2;
            case '/': return $op1 / $op2;
        }
    }

    function handleButtonclicks() {
        global $stateInx, $result, $op1, $op2, $value, $operator;

        if (isset($_POST['submit'])){
            $stateInx = $_POST['stateInx'];
            $op = $_POST['submit'];
            $value = $_POST['value'];
            $op1 = $_POST['op1'];
            $operator = $_POST['operator'];
        
            if (checkState($stateInx, $op) == False){
                $stateInx = ERROR;
                $value = "Error";
            } else if ($op == 'c') {
                $stateInx = OP1_START;
                $value = 0;
            } else if ($stateInx == OP1_START) {
                $stateInx = OP1;
                $value = $op;
            } else if ($stateInx == OP1) {
                if (isDigit($op)) {
                    $value = $value * 10 + $op;
                } else {
                    $op1 = $value;                  // left operand
                    $operator = $op;                // operator check
                    $stateInx = OP2_START;
                }  
            } else if ($stateInx == OP2_START) {
                $value = $op;
                $stateInx = OP2;
            } else if ($stateInx == OP2) {
                if (isDigit($op)) {
                    $value = $value * 10 + $op;
                } else {
                    $value = calc($operator,$op1,$value);               
                    $stateInx = FINISHED;
                }
            } 
            
        }
    }

?>
