<?php

//o Composer usa o Autoload PSR-4 para não precisarmos usar require ou require_once
//em cada arquivo, mas é necessário usar namespaces
namespace App\Controllers;

use MF\Controller\Action;
use App\Connection;
use App\Models\Produto;

class IndexController extends Action{

    public function index() {
        //instância da conexão
        $conn = Connection::getDb();

        //instância modelo
        $produto = new Produto($conn);
        $produtos = $produto->getProdutos();
        $this->view->dados = $produtos;

        $this->render('index', 'layout1');
    }

    public function sobreNos() {
        //$this->view->dados = array('Sofá', 'Cadeira');
        $this->render('sobreNos', 'layout2');//nome da View
    }

}
    

?>