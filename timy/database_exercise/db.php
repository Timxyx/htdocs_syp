<?php 

    $dbUser = "root";
    $dbPwd = "";
    $dbHost = "localhost";
    $database = "simple_auth";

    // Verbindung zum DBMS und zur Datenbank
    $con = @mysqli_connect($dbHost, $dbUser, $dbPwd, $database);

    if(!$con){
        die ("Could not connect to database");
    }

    function checkLogin ($user, $password){
        return True;
    }


?>