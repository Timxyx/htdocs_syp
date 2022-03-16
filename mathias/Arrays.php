
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Arrays in PHP</h1>
    <h2>Elementare Arrays</h2>
    <?php
    $values = Array(12,3,5,2);

    echo "[2]: " . $values[2] . "<br />";
    $values[] = 21;     // am Ende des Arrays anhängen
    echo "[4]: " . $values[4] . "<br />";
    $values[6] = 6;     // Löcher sind möglich, Index 6 nicht belegt
    echo "[6] :" . $values[6] . "<br />";

    if(!isset($values[5]))
        echo "indes 5 not set! <br />";
    $values["form"] = "2AKIFT";
    print_r($values);
    //echo "[5] : " . @$values[5] . "<br />";
?>
    <h3>Assoziative Arrays</h3>
    <?php
        $forms = Array();
        $forms["2AKIFT"] = Array("Arg Stefan","Boandl Rene","Tai Pai");
        $forms["4AKIFT"] = Array ("Muster Thomas", "Zorn Lukas", "Horst Hans");
        print_r($forms);

        echo "<br /> Schüler der Klasse 2AKIFT: <br />";
        foreach ($forms["2AKIFT"] as $key => $pupil)
            echo "Schüler: $key: $pupil <br />";
    ?>

    <h3>Übung</h3>
    <?php
        $persons[0] = Array ("Agg","Stefan",1985);
        $persons[1] = Array ("Boandl","Rene",1984);
        $persons[3] = Array ("Fuchs","Klaus",1982);
        $persons[4] = Array ("Mustermann","Max",1938);
        $persons[5] = Array ("Hilfiger", "Tommy",1901);
        // Wer ist der Älteste?
        $minYob = 9999;
        foreach ($persons as $key => $person)
            if ($person[2] < $minYob)
                $minYob = $person[2];
                $keyoldest = $key;


        print_r ("Ältester: " . $persons[$keyoldest][0] . " " . $persons[$keyoldest][1] . " <br />");
    ?>

    
</body>
</html>

