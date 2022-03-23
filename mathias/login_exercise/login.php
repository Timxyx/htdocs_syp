
<?php

require_once './dbtools.php';

if (isset($_REQUEST['submit'])) { // kann auch POST sein
    if (checkLogin($_REQUEST['user'], $_REQUEST['password'])) {
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/login.css" />
    <meta charset="UTF-8" />
    <title>Login Site</title>
</head>
<body>
    <div id="wrapper">
        <div id="top">

        </div>
        <div id="content">
            <form id="login" method="post" action="login.php">
                <table id="loginTable">
                    <tr>
                        <td>Anwender</td>
                        <td>
                            <input type="text" name="user" placeholder="Anwendername" />
                        </td>
                    </tr>
                    <tr>
                        <td>Kennwort</td>
                        <td>
                            <input type="text" name="password" placeholder="Passwort" />
                        </td>
                    </tr>
                    <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="anmelden" />
                            </td>
                    </tr>
                </table>
            </from>

        </div>
        <div id="bottom">

        </div>
        <div class="container">

        </div>
    </div>
</body>
</html>