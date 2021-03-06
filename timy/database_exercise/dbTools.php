<?php
require_once './db.php';

    function getHistory($username){
        global $con;
        $sql = "SELECT name, description, start_time, end_time, id FROM trackings WHERE user_id = (SELECT id FROM users WHERE username = '$username') AND isRunning = 0";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_all($result);
    }

    function deleteItem($id){
        global $con;
        $sql = "DELETE FROM trackings WHERE id = '$id'";
        mysqli_query($con, $sql);
        header("Location: welcome.php");
    }

    function getRunning($username){
        global $con;
        $sql = "SELECT name, description, start_time, end_time, id FROM trackings WHERE user_id = (SELECT id FROM users WHERE username = '$username') AND isRunning = 1";
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

    function getUserid($username){
        global $con;
        $sql = "SELECT id FROM users WHERE username = '$username'";
        $result = $con->query($sql)->fetch_object()->id;
        return $result;
    }

    function startTracking($name, $description){
        global $con;
        $username = $_SESSION['username'];
        $user_id = getUserid($username);
        $timestamp = date("Y-m-d H:i:s");
        $sql = "INSERT INTO trackings (name, description, start_time, isRunning, user_id) VALUES ('$name', '$description', '$timestamp', True, $user_id)";
        echo "sql: " . $sql;
        mysqli_query($con, $sql);
    }

    function stopItem($id, $time){
        global $con;
        $timestamp = date("Y-m-d H:i:s");
        $sql = "UPDATE trackings SET isRunning = 0, end_time = '$timestamp' WHERE id = $id";
        mysqli_query($con, $sql);
        header("Location: welcome.php");
    }

    function getPara($name, $defaultValue = "", $command = "POST"){
        $filterType = ($command == "POST") ? INPUT_POST : INPUT_GET;
        if(isset($_REQUEST[$name])){
            return filter_input($filterType, $name, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $defaultValue;
    }

    function getDuration($username){
        global $con;

        $sql = "SELECT company_id FROM users WHERE username = '$username'";
        $result = mysqli_query($con, $sql);
        $company_id = $con->query($sql)->fetch_object()->company_id;
        
        $sql = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(t.end_time) - TIME_TO_SEC(t.start_time))) as duration FROM companies c, users u, trackings t 
        WHERE c.id = u.company_id AND t.user_id = u.id AND c.id = $company_id AND t.isRunning = 0";
        $result = mysqli_query($con, $sql);
        $duration = $con->query($sql)->fetch_object()->duration;

        return $duration;
    }

    function getCompanyName($username){
        global $con;
        $sql = "SELECT c.name FROM companies c WHERE id = (SELECT company_id FROM users WHERE username = '$username') ";

        $company = $con->query($sql)->fetch_object()->name;
        return $company; 
    }
?>