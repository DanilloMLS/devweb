<?php
    /*print_r($_GET);
    $_GET['email'];
    $_GET['senha']*/
    //print_r($_POST);
    session_start();
    $usuario_auth = false;
    $usuario_id = null;
    $usuario_perfil = null;

    $perfis = array(1 => 'administrador', 2 => 'usuário');

    $usuario_app = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'maria@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'jose@teste.com.br', 'senha' => '123456', 'perfil_id' => 2)
    );

    foreach ($usuario_app as $user) {
        echo 'Usuário app: '. $user['email'] . '/' . $user['senha'];
        echo '<br>';
        echo 'Usuário form: ' . $_POST['email']. '/' . $_POST['senha'];
        echo '<hr>';

        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_auth = true;
            $usuario_id = $user['id'];
            $usuario_perfil = $user['perfil_id'];
        }
    }

    if ($usuario_auth == true) {
        echo 'Autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['usuario'] = $_POST['email'];
        $_SESSION['senha'] = $_POST['senha'];
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil;
        header('Location: home.php');
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
        //echo 'Erro na autenticação';
    }
    
?>