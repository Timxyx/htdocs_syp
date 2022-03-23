

<?php

$dbUser ="root";
$dbPwd = "";
$dbHost = "localhost";
$database = "syp";

// Verbindung zum DBMS & zur Datenbank
$connection = @mysqli_connect($dbHost, $dbUser, $dbPwd, $database);
if (!$connection)
    die("Failed to connect to database: $database");

function checkLogin($user,$password) {
    return true;

}

?>