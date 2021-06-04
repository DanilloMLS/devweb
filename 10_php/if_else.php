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
        $a = 2;
        $b = 1;
        $c = 3;

        if ($a === $b) {
            echo "$a e $b são iguais.<br/>";
        } else {
            echo "$a e $b são diferentes.<br/>";
        }

        if ($a > $b) {
            echo "$a é maior que $b.<br/>";
        } else {
            echo "$a é menor que $b.<br/>";
        }
        
        //AND &&
        //OR ||
        //XOR
        //!
        if ($c === 3 AND $a > $b) {
            echo 'Verdadeiro';
        } else {
            echo 'Falso';
        }

        $teste = true;

    ?>

    <p><?= $teste ? 'Sim' : 'Não'; ?></p>
</body>
</html>