
<?php
$host = "localhost";
$dbUser = "root";
$dbPwd = "";
$database = "syp_event";

$con = @mysqli_connect($localhost,$dbUser,$dbPwd,$database);
if (!$con)
    die("Error connecting to database $database");

    //usage:    alle Datensätze der Tabelle 'items' liefern
    //returns:  Array aller Datensätze (als Array)
function getItems() {
    global $con;
    $sql = "SELECT * FROM items";
    $result = mysqli_query($con,$sql);
    return mysqli_fetch_all($result);
}
?>