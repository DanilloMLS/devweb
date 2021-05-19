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
        $array = ['notebook','teclado'];
        //is_array($array): verifica se $array é array
        $retorno = is_array($array);

        if ($retorno) {
            echo 'é array';
        } else {
            echo 'não é array';
        }

        echo '<hr>';

        $array2 = [5=>'Morango',4=>'Maçã',3=>'Uva',2=>'Banana'];
        //retorna um array com os índices de outro
        $indices = array_keys($array2);
        echo '<pre>';
        print_r($indices);
        echo '</pre>';

        echo '<hr>';
        
        $array3 = ['Uva','Maçã','Banana'];
        //ordena o array, alterando as chaves conforme necessário
        sort($array3);
        echo '<pre>';
        print_r($array3);
        echo '</pre>';

        echo '<hr>';

        $array4 = ['Uva','Maçã','Banana'];
        //ordena o array, mas cada elemento manterá sua chave original
        asort($array4);
        echo '<pre>';
        print_r($array4);
        echo '</pre>';

        echo '<hr>';

        $array5 = ['Uva','Maçã','Banana'];
        //conta quantos elementos há no array
        echo count($array5);

        echo '<hr>';

        //une arrays
        $array6 = array_merge($array3,$array4,$array5);
        echo '<pre>';
        print_r($array6);
        echo '</pre>';

        echo '<hr>';

        $string = '15/04/1989';
        //quebra uma string em um array
        $array7 = explode('/',$string);
        echo '<pre>';
        print_r($array7);
        echo '</pre>';

        echo '<hr>';

        $string2 = implode(',',$array6);
        echo $string2;
    ?>
</body>
</html>