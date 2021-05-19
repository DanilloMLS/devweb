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
        $numero = 154.286;

        echo ceil($numero).'<br/>'; //para cima
        echo floor($numero).'<br/>'; //para baixo
        echo round($numero,2).'<br/>'; //para baixo, com base em número de casas decimais passado como parâmetro

        echo rand().'<br/>'; //número inteiro aleatório
        echo getrandmax().'<br/>'; //maior número possível
        echo sqrt(9); //raiz quadrada
    ?>
</body>
</html>