

<?php
$host = "localhost";
$dbUser = "root";
$dbPwd = "";
$database = "syp_event";

$con = @mysqli_connect($localhost,$dbUser,$dbPwd,$database);
if (!$con)
    die("Error connecting to database $database");

?>