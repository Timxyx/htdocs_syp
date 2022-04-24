<?php
require_once './db.php';

    function getHistory($username,){
        global $con;
        $sql = "SELECT name, description, start_time, end_time FROM trackings WHERE user_id = (SELECT id FROM users WHERE username = '$username')";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_all($result);
    }

    function getCompanyId($companyName){
        global $con;
        $sql = "SELECT id FROM companies WHERE name = '$companyName'";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_all($result);
    }

    function userTaken($user){
        global $con;
        $sql = "SELECT * FROM `users` WHERE username='$user'AND password='";
        $result = mysqli_query($con, $sql);
        return mysqli_num_rows($result) > 0 ? True : False;
    }

    function register($username, $password, $companyName, $email){
        global $con;
        $company_id = getCompanyId($companyName);

        if(userTaken($username)){
            return false;
        }

    
        $sql = "INSERT INTO users(username, password, email, company_id) VALUES ('$username', '$password', '$company_id', '$email')";
        mysqli_query($con, $sql);
        return true;
    }
?>