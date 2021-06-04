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
        //$lista_frutas = array('Banana','Maçã','Morango','Uva');
        $lista_frutas = ['Banana','Maçã','Morango','Uva'];
        $lista_frutas[] = 'Abacaxi';

        echo '<pre>';
        var_dump($lista_frutas);
        echo '</pre>';
        echo '<br>';
        echo '<pre>';
        print_r($lista_frutas);
        echo '</pre>';

        echo '<hr>';

        //array associativo
        $lista_coisas = [
            'a' => 'lápis',
            'b' => 'borracha',
            'c' => 'caneta'
        ];

        echo '<pre>';
        print_r($lista_coisas);
        echo '</pre>';

        echo '<hr>';

        //array multidimensional
        $lista = [];
        $lista['frutas'] = ['Banana','Maçã','Morango','Uva'];
        $lista['pessoas'] = ['João','José','Maria'];

        echo '<pre>';
        print_r($lista);
        echo '</pre>';

        echo '<hr>';

        //pesquisa em arrays
        //in_array('item',$array) -> true/1 ou false/vazio para existência
        echo in_array('Morango',$lista_frutas).'<br>';

        //array_search('item',$array) -> retorna o índice do termo da busca. Null, se não achar
        echo array_search('Morango',$lista_frutas).'<br>';
    ?>
</body>
</html>