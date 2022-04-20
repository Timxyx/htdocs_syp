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
?>