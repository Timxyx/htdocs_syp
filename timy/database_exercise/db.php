<?php 

    $dbUser = "root";
    $dbPwd = "";
    $dbHost = "localhost";
    $database = "timetracker";

    // Verbindung zum DBMS und zur Datenbank
    $con = @mysqli_connect($dbHost, $dbUser, $dbPwd, $database);

    if(!$con){
        die ("Could not connect to database");
    }

    function checkLogin($user, $password){
        global $con;
        $sql = "SELECT * FROM `user` WHERE username='$user'AND password='".$password."'";
        $result = mysqli_query($con, $sql);
        
        
        return mysqli_num_rows($result) > 0 ? True : False;
    }


?>