
<html>

<style>
    <?php include "./test.css"; ?>
</style>

<head>

    <title>lesson01</title>

</head>
<body>
    <?php 

        $any = 1;
        $drink = "bier";
        $values = Array(1, 21, 13, 5);
        $from = Array("2AKIFT" => Array("dude", "timy"));
        $from["4ABET"] = Array("janik", "Thomas");
        $from["4AKIFT"] = Array("florian", "jakob");
        

        $persons[0] = Array("Agg", "Stefan", 1985);
        $persons[1] = Array("Boandk", "Rene", 1984);
        $persons[2] = Array("Fuchs", "Klaus", 1982);
        $persons[3] = Array("Djon", "Timothy", 1999);

        $oldest = $persons[0][2];
        $oldestName = $persons[0];

        foreach ($persons as $dude){
            if ($dude[2] < $oldest){
                $oldestName = $dude[0] . " " . $dude[1];
            }
        };

        
        echo "<div class='container'>
            <nav>
                <h1 class='title' >lesson " . $any;"</h1>
            </nav>
        </div>";

        echo "<p>Getränk: " . $drink;"</p> <br/>";

        foreach ($from["2AKIFT"] as $key => $pupil){
            echo "$key Schueler: $pupil <br/>";
        }
        echo "<p>Oldest: ". $oldestName;"</p>";
    ?>
</body>
</html>