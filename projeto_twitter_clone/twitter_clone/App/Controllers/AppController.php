<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{

    public function timeline() {
        $this->validaAutenticacao();

        $tweet = Container::getModel('Tweet');
        $tweet->__set('id_usuario', $_SESSION['id']);
        $tweets = $tweet->getAll();
        $this->view->tweets = $tweets;
        
        $this->render('timeline');
    }

    public function tweet() {
        $this->validaAutenticacao();

        $tweet = Container::getModel('Tweet');
        $tweet->__set('tweet',$_POST['tweet']);
        $tweet->__set('id_usuario',$_SESSION['id']);
        $tweet->salvar();

        header("Location: /timeline");
    }

    public function validaAutenticacao() {
        session_start();

        if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header("Location: /?login=erro");
        }
    }

    public function quemSeguir() {
        $this->validaAutenticacao();
        $usuarios = array();

        $pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor'] : '';
        if ($pesquisarPor != '') {
            $usuario = Container::getModel('Usuario');
            $usuario->__set('nome', $pesquisarPor);
            $usuario->__set('id', $_SESSION['id']);
            $usuarios = $usuario->getAll();
        }
        $this->view->usuarios = $usuarios;

        $this->render('quemSeguir');
    }

    public function acao() {
        $this->validaAutenticacao();
        
        $usuario_seguidor = Container::getModel('UsuarioSeguidor');

        //id do usuário que será seguido
        $id_usuario_seguindo = $_GET['id_usuario'] ? $_GET['id_usuario'] : '';
        //id do usuário seguidor
        $usuario_seguidor->__set('id_usuario',$_SESSION['id']);

        $acao = $_GET['acao'] ? $_GET['acao'] : '';
        if ($acao == 'seguir') {
            $usuario_seguidor->seguirUsuario($id_usuario_seguindo);
        } else if ($acao == 'deixar_de_seguir'){
            $usuario_seguidor->deixarSeguirUsuario($id_usuario_seguindo);
        }
        
        header("Location: /quem_seguir");
    }
}

?>