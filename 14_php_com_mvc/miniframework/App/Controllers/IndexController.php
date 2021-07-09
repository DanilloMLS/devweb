<?php

//o Composer usa o Autoload PSR-4 para não precisarmos usar require ou require_once
//em cada arquivo, mas é necessário usar namespaces
namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

use App\Models\Info;
use App\Models\Produto;

class IndexController extends Action{

    public function index() {
        
        $produto = Container::getModel('Produto');

        $produtos = $produto->getProdutos();
        $this->view->dados = $produtos;
        $this->render('index', 'layout1');
    }

    public function sobreNos() {
        $info = Container::getModel('Info');

        $informacoes = $info->getInfo();
        $this->view->dados = $informacoes;
        $this->render('sobreNos', 'layout2');
    }

}
    

?>