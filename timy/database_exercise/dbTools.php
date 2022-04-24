<?php
require_once './db.php';

    function getHistory($username,){
        global $con;
        $sql = "SELECT name, description, start_time, end_time FROM trackings WHERE user_id = (SELECT id FROM users WHERE username = '$username')";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_all($result);
    }
?>