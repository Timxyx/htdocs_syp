
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
/*
function getContribItems($userId) {
    global $con;
    $sql = "SELECT * FROM items i LEFT OUTER JOIN contribs c ON i.id = c.item_id WHERE ";
    $result = mysqli_query($con,$sql);
    return mysqli_fetch_all($result);
}
*/
function getContribItemAmount($userId, $itemId) {
    global $con;
    $sql = "SELECT amount FROM contribs WHERE item_id = $itemId AND user_id = $userId";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    return $row == null ? 0 : $row['amount'];
}


function itemExists($name) {
    global $con;
    $sql = "SELECT id FROM items WHERE name = '$name'";
    $result = mysqli_query($con,$sql);
    return mysqli_num_rows($result) > 0 ? true : false;
}

function contribExists($userId, $itemId) {
    global $con;
    $sql = "SELECT id FROM contribs WHERE item_id = $itemId AND user_id = $userId";
    $result = mysqli_query($con,$sql);
    return mysqli_num_rows($result) > 0 ? true : false;
}

function insertOrUpdateItem($name,$amount,$unit) {
    global $con;
    if (itemExists($name))
        $sql = "UPDATE items SET amount = amount + $amount WHERE name = '$name'";
    else
        $sql = "INSERT INTO items (name,amount,unit) VALUES ('$name', $amount, '$unit')";
    mysqli_query($con,$sql);
}

function saveItem($id,$name,$amount,$unit) {
    global $con;
    $sql = "UPDATE items SET name = '$name', amount = '$amount', unit = '$unit' WHERE id = $id";
    mysqli_query($con,$sql);
}

function deleteItem($id) {
    global $con;
    $sql = "DELETE FROM items WHERE id = $id";
    mysqli_query($con,$sql);
}

function checkUser($user, $pwd) {
    global $con;
    $sql = "SELECT * FROM users WHERE user = '$user' AND pwd = '$pwd'";
    $result = mysqli_query($con,$sql);
    return (mysqli_num_rows($result) > 0) ? true : false;
}

// usage:   read type from DB
// if no record found => returns 0
function getUserType($user, $pwd = null) {
    global $con;
    $sql = "SELECT type FROM users WHERE user = '$user' ";
    if ($pwd != null)
        $sql .= " AND pwd = '$pwd'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    return (mysqli_num_rows($result) == 0) ? 0 : $row['type'];
}

// returns 0 if user and pwd doesn't exist
function getUser($user, $pwd = null) {
    global $con;
    $sql = "SELECT * FROM users WHERE user = '$user' ";
    if ($pwd != null)
        $sql .= " AND pwd = '$pwd'";
    $result = mysqli_query($con,$sql);
    return mysqli_fetch_array($result);     //assoz. Array! [0] oder username, [1] oder password
}

function insertOrUpdateContribs ($userId, $itemId) {
    global $con;
    if (itemAmountLeft($itemId) <= 0)       // falls wir schon genügend items haben
        return;

    if (contribExists($userId,$itemId))
        $sql = "UPDATE contribs SET amount = amount +1 WHERE item_id = $itemId AND user_id = $userId";
    else
        $sql = "INSERT INTO contribs (amount,item_id,user_id) VALUES (1,$itemId,$userId)";
    echo $sql;
    mysqli_query($con,$sql);
}

function itemAmountLeft($itemId) {
    global $con;
    $sql = "SELECT sum(amount) as amount FROM contribs WHERE item_id = $itemId";
    $result = mysqli_query($con,$sql);
    $row1 = mysqli_fetch_array($result);

    $sql = "SELECT amount FROM items WHERE id = $itemId";
    $result = mysqli_query($con,$sql);
    $row2 = mysqli_fetch_array($result);

    return $row2['amount'] - $row1['amount'];
}

?>