<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 2 - Arrays</title>
</head>
<body>
    <?php
        $array = array();
        
        while (count($array) < 6) {
            $n = rand(1,60);
            
            if (!in_array($n,$array)) {
                $array[] = $n;
            }
        }

        print_r($array);
    ?>
</body>
</html>