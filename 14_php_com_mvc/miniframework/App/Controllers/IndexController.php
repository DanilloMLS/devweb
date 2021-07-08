<?php

//o Composer usa o Autoload PSR-4 para não precisarmos usar require ou require_once
//em cada arquivo, mas é necessário usar namespaces
namespace App\Controllers;

use MF\Controller\Action;

class IndexController extends Action{

    public function index() {
        $this->view->dados = array('Sofá', 'Cadeira', 'Cama');
        $this->render('index', 'layout1');
    }

    public function sobreNos() {
        $this->view->dados = array('Sofá', 'Cadeira');
        $this->render('sobreNos', 'layout2');//nome da View
    }

}
    

?>