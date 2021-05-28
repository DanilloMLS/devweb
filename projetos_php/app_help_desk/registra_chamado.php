<?php
    /* echo '<pre>';
    print_r($_POST);
    echo '</pre>'; */
    session_start();

    //tratamento do texto a ser persistido
    $_POST['titulo'] = str_replace('#','-',$_POST['titulo']);
    $_POST['categoria'] = str_replace('#','-',$_POST['categoria']);
    $_POST['descricao'] = str_replace('#','-',$_POST['descricao']);
    $texto = $_SESSION['id'] .'#'. implode('#',$_POST) . PHP_EOL;

    //abre o arquivo, ou cria se não existir, e escreve no final dele
    $arquivo = fopen('../../app_help_desk/arquivo.hd','a');
    
    //escreve o texto e fecha o arquivo
    fwrite($arquivo, $texto);
    fclose($arquivo);
    header('Location: abrir_chamado.php');
    //echo $texto;
?>