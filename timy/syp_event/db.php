<?php
    $host = "localhost";
    $dbUser = "root";
    $dbPwd = "";
    $database = "syp_event";

    $con = @mysqli_connect($host, $dbUser, $dbPwd, $database);   

    if(!$con){
        die ("Error connecting to database");
    }


    function get_items(){
        global $con;
        $sql = "SELECT * FROM items";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_all($result);
    }

    

    function itemExists($name){
        global $con;
        $sql = "SELECT id FROM items WHERE name = '$name'";
        $result = mysqli_query($con, $sql);
        return mysqli_num_rows($result) > 0 ? True : False;
    }

    function insertItem($name, $amount, $unit){
        global $con;

        if (itemExists($name)){
            $sql = "UPDATE items SET amount = amount + $amount WHERE name = '$name'";
        }
        else{
            $sql = "INSERT INTO items (name, amount, unit) VALUES ('$name', $amount, '$unit')";
        }
        mysqli_query($con, $sql);
    }
    function saveItem($name, $amount, $unit, $id){
        global $con;
        

        $sql = "UPDATE items SET name = '$name', amount = $amount, unit = '$unit' WHERE id = $id";
        mysqli_query($con, $sql);
    }

    function deleteItem($id){
        global $con;
        $sql = "DELETE FROM items WHERE id = $id";
        mysqli_query($con, $sql);
    }

    function checkUser($user, $pwd){
        global $con;
        $sql = "SELECT id FROM users WHERE name = '$user' AND pwd = '$pwd'";
        $result = mysqli_query($con, $sql);
        return (mysqli_num_rows($result) > 0) ? true : false;
    }

    function get_contrib_items($userId){
        global $con;

        $sql = "SELECT * FROM items i LEFT OUTER JOIN contribs c ON i.id = c.item_id WHERE c.user_id = $userId";


        $result = mysqli_query($con, $sql);
        return (mysqli_num_rows($result) > 0) ? true : false;
    }

    function getContribItemAmount($userId, $itemId){
        global $con;
        $sql = "SELECT amount FROM contribs WHERE user_id = $userId AND item_id = $itemId";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        return $row == null ? 0 : $row['amount'];
    }

    function contribExists($userId, $itemId){
        global $con;
        $sql = "SELECT id FROM contribs WHERE item_id = '$itemId' AND user_id = '$userId'";
        $result = mysqli_query($con, $sql);
        return mysqli_num_rows($result) > 0 ? True : False;
    }

    function insertOrUpdateItem($userId, $itemId, $cmd){
        global $con;
        if($cmd == "add"){
            $op = "+";
        }
        else if($cmd == "sub"){
            $op = "-";
        }

        if(itemsAmountLeft($itemId) <= 0){
            return;
        }

        if (contribExists($userId, $itemId)){
            $sql = "UPDATE contribs SET amount = amount $op 1 WHERE item_id = $itemId AND user_id = $userId";
        }
        else{
            $sql = "INSERT INTO contribs (amount, item_id, user_id) VALUES (1, $itemId, $userId)";
        }
        mysqli_query($con, $sql);
    }

    function itemsAmountLeft($itemId){
        global $con;
        $sql = "SELECT sum(amount) as amount FROM contribs WHERE item_id = $itemId";
        $result = mysqli_query($con, $sql);
        $row1 = mysqli_fetch_array($result);

        $sql = "SELECT amount FROM items WHERE id = id";
        $result = mysqli_query($con, $sql);
        $row2 = mysqli_fetch_array($result);

        return $row2['amount'] - $row1['amount'];

    }
?>