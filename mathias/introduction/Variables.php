
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    // Variablen werden dynamisch erzeugt
    $any = 1; // Variablennamen beginnen mit $
    echo "any : " . $any . "<br />"; // . Verkettungsoperator

    $any = "zwei";
    echo "any : " . $any. "<br />";
    // Kontrollstrukturen: ähnlich wie C
    // Operatoren ähnlich wie C
    // Es gibt 2 Arten von Strings: "..."  '...'
    echo "Test <br />";
    echo 'Test <br />';

    $drink = "Bier";
    
    echo "Murauer $drink <br />"; // Variable wird ersetzt!
    echo 'Murauer $drink <br />'; // Variable wird nicht ersetzt!
?>
    
</body>
</html>

