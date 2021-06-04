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
        $texto = 'dAnillo MORAES';
        echo strtolower($texto.'<br/>');
        echo strtoupper($texto.'<br/>');
        echo ucfirst($texto.'<br/>');
        echo strlen($texto) . '<br/>';

        //('Texto que será substituído','Texto que irá substituir',$variável)
        echo str_replace('MO','Mo',$texto) . '<br/>';

        //($variável,'posição do 1º caracter','tamanho da substring')
        echo substr($texto,'4','5');
        
    ?>
    <div id="novo">
    </div>
</body>
</html>