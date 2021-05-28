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
        $a = 0;
        while ($a <= 10) {
            echo "$a";
            $a++;
        }

        echo "<hr>";

        $b = 0;
        do {
            echo "$b";
            $b++;
        } while ($b <= 10);

        echo "<hr>";

        for ($i=0; $i < 10; $i++) { 
            # code...
        }

        echo "<hr>";

        $registros = ['A','B','C','D'];
        for ($i=0; $i < count($registros); $i++) { 
            echo "$registros[$i] <br>";
        }

        echo "<hr>";

        $itens = array('sofá','mesa','cadeira','fogão','geladeira');
        foreach ($itens as $item) {
            echo "$item <br>";
        }

        echo "<hr>";

        foreach ($itens as $i => $item) {
            echo "$i";
        }

        echo "<hr>";

        $funcionarios = array(
            array('nome' => 'João', 'salario' => 2500,'data_nascimento' => '01/02/1982'),
            array('nome' => 'Maria', 'salario' => 3500),
            array('nome' => 'José', 'salario' => 4500)
        );
        echo "<pre>";
        print_r($funcionarios);
        echo "</pre>";

        foreach ($funcionarios as $index => $funcionario) {
            foreach ($funcionario as $index2 => $valor) {
                echo "$index2 - $valor <br>";
            }
            echo "<hr>";
        }
    ?>
</body>
</html>