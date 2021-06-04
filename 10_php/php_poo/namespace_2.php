<?php
    //somente funciona em classes e interfaces
    require "./bibliotecas/lib1/lib1.php";
    require "./bibliotecas/lib2/lib2.php";

    //com o alias ("as") podemos usar classes com o mesmo nome,
    //ou simplesmente renomear uma classe para uso
    use A\Cliente as ClienteA;
    use B\Cliente as ClienteB;

    $c = new ClienteA();
    print_r($c);
    $c->metodoDeA();

    echo '<hr>';

    $c2 = new ClienteB();
    print_r($c2);
    $c2->metodoDeB();

?>