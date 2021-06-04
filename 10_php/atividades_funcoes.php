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
        $salario = 2000.00;
        function calcularImposto($salario) {
            if ($salario <= 1903.98) {
                echo 'isento';
            } else if ($salario > 1903.98 && $salario <= 2826.65) {
                echo '7,5%';
            } else if ($salario > 2826.65 && $salario <= 3751.05) {
                echo '15%';
            } else if ($salario > 3751.05 && $salario <= 4664.68) {
                echo '22.5%';
            } else {
                echo '27.5%';
            }
        }

        calcularImposto($salario);
    ?>
</body>
</html>