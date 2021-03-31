<head>
    <title><?= html($about) ?></title>
</head>

<body>

<div class="container">
    <h1><?= html($about) ?></h1>
    <hr>
    <p>
        Mein Name ist Richard Strittmatter. Ich bin

        <?php
        // Calculates my accurate age and displays it
        $from = new DateTime('2002-01-24');
        $to   = new DateTime('today');
        echo $from->diff($to)->y;
        ?>

        Jahre alt uns komme aus Freiburg (Deutschland) Momentan bin ich
        im dritten Jahr meiner Ausbildung zum Informatiker in Richtung Applikationsentwicklung.
        Ich besuche ein zwei-jähriges Praktikum bei der <a href="https://orca.ch">Orca Services AG</a>
    </p>

    <img style="width: 450px" height="600px" src="images/richi.png" alt="Richi-Picture">

</div>

</body>