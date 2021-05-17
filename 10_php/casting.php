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
        //gettype(variável) -> retorna o tipo da variável
        $valor = 10;
        $valor2 = 12.54;
        $valor3 = '12.45';
        $valor4 = true;

        //float, double ou real == double
        $valor5 = (string) $valor;
        $valor6 = (boolean) $valor;
        $valor7 = (float) $valor3;
        $valor8 = (string) $valor4;

        echo gettype($valor8);
        echo $valor8;
    ?>
</body>
</html>