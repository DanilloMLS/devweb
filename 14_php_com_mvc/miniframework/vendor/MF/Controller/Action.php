<?php

namespace MF\Controller;

use stdClass;

abstract class Action {
    protected $view;

    public function __construct() {
        //criação de objeto vazio
        $this->view = new stdClass();
    }

    protected function render($view, $layout) {
        $this->view->page = $view; //indicação da rota

        //tenta carregar um layout dinamicamente
        if (file_exists("../App/Views/".$layout.".phtml")) {
            require_once "../App/Views/".$layout.".phtml";
        } else {
            $this->content();
        }
    }

    protected function content() {
        $classAtual = get_class($this);
        $classAtual = str_replace("App\\Controllers\\",'',$classAtual);
        $classAtual = strtolower(str_replace("Controller",'',$classAtual));

        require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";
    }
}
    

?>