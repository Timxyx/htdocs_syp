


<?php

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
                || ($stateInx == 3 && (isDigit($op) || $op == "="))
                || ($stateInx == 4 && $op == 'c')
                || ($stateInx == 5 && $op == 'c'))

            return true;
        return false;
    }


?>
