<?php
require_once './db.php';

    function getHistory($username,){
        global $con;
        $sql = "SELECT name, description, start_time, end_time FROM trackings WHERE user_id = (SELECT id FROM users WHERE username = '$username')";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_all($result);
    }
    function companyTaken($companyName){
        global $con;
        $sql = "SELECT * FROM `companies` WHERE name='$companyName'";
        $result = mysqli_query($con, $sql);
        return mysqli_num_rows($result) > 0 ? True : False;
    }

    function createCompany($companyName){
        global $con;
        $sql = "INSERT INTO companies (name) VALUES ('$companyName')";
        mysqli_query($con, $sql);
    }



    function getCompanyId($companyName){
        global $con;

        if(companyTaken($companyName)){
            $sql = "SELECT id FROM companies WHERE name = '$companyName'";
            $result = mysqli_query($con, $sql);
            $result = $con->query($sql)->fetch_object()->id;
            return $result;
        }

        createCompany($companyName);
        $sql = "SELECT id FROM companies WHERE name = '$companyName'";
        $result = $con->query($sql)->fetch_object()->id;
        return $result;
    }

    function userTaken($user){
        global $con;
        $sql = "SELECT * FROM `users` WHERE username='$user'";
        $result = mysqli_query($con, $sql);
        return mysqli_num_rows($result) > 0 ? True : False;
    }



    function register($username, $password, $companyName, $email){
        global $con;

        if(userTaken($username)){
            return false;
        }
        $company_id = getCompanyId($companyName);
        echo $company_id;
    
        $sql = "INSERT INTO users(username, password, email, company_id) VALUES ('$username', '$password', '$email', $company_id)";
        mysqli_query($con, $sql);
        return true;
    }
?>