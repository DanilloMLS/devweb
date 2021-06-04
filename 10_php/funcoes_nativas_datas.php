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
        echo date('d/m/Y H:i').'<br/>';
        echo date_default_timezone_get().'<br/>';
        //é possível mudar o timezone no arquivo php.ini
        //date_default_timezone_set('America/Recife');
        echo date('d/m/Y H:i').'<hr/>';

        $data_inicial = '2018-04-24';
        $data_final = '2021-05-18';

        //strtotime($data): SEGUNDOS desde 01/01/1970 até $data
        $time_inicial = strtotime($data_inicial);
        echo $time_inicial.'<br/>';
        $time_final = strtotime($data_final);
        echo $time_final.'<br/>';

        $diferenca_time = $time_final - $time_inicial;
        echo 'Segundos entre as duas datas: '.$diferenca_time;
        echo '<br/>';
        echo 'Dias entre as duas datas: '.$diferenca_time / (24 * 60 * 60);
    ?>
</body>
</html>