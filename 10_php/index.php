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
        $nome = 'Danillo';
        $idade = 32;
        $peso = 51.5;
        $fumante = true; //true = 1; false = vazio

        // + rápido
        echo 'Nome: ' . $nome;
        echo '<br />';
        // + lento
        echo "Idade: $idade";
    ?>

    <h1>Ficha</h1>
    <br/>
    <p>Peso: <?= $peso?> </p>
    <p>Fumante: <?= $fumante?> </p>
</body>
</html>