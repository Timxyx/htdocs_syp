
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
function itemExists($name) {
    global $con;
    $sql = "SELECT id FROM items WHERE name = '$name'";
    $result = mysqli_query($con,$sql);
    return mysqli_num_rows($result) > 0 ? true : false;
}
function insertOrUpdateItem($name,$amount,$unit) {
    global $con;
    if (itemExists($name)) {
        $sql = "UPDATE items SET amount = amount + $amount WHERE name = '$name'";
        print_r("im in itemsExisits");
    } else {
        $sql = "INSERT INTO items (name,amount,unit) VALUES ('$name', $amount, '$unit')";
        //echo $sql;
    }
    mysqli_query($con,$sql);

}
?>