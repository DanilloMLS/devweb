<?php

namespace MyApp\controllers;

class Home {

    protected $container;

    public function __construct($container) {
        
        $this->container = $container;

    }

    public function index($request, $response) {

        $view = $this->container->get('View');
        var_dump($view);
        return $response->write("Resposta");

    }
}

?>