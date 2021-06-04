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

        //o switch pode fazer casting
        //1 == true
        $variable = '3';

        switch ($variable) {
            case 1:
                echo 'Case 1';
                break;
            case 2:
                echo 'Case 2';
                break;
            case 3:
                echo 'Case 3';
                break;
            default:
            echo 'Case default';
                break;
        }
    ?>
</body>
</html>