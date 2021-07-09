<?php

    namespace MF\Init;

    //funções e métodos da lógica do funcionamento do framework
    abstract class Bootstrap {
        
        private $routes;

        abstract protected function initRoutes();

        //inicialização do vetor de rotas
        public function __construct() {
            $this->initRoutes();
            $this->run($this->getUrl());
        }

        public function getRoutes() {
            return $this->routes;
        }

        public function setRoutes(array $routes) {
            $this->routes = $routes;
        }

        //executa uma ação
        protected function run($url) {
            foreach ($this->getRoutes() as $key => $route) {
                if ($url == $route['route']) {
                    $class = "App\\Controllers\\".ucfirst($route['controller']);
                    $controller = new $class; //instância dinâmica de um Controller
                    
                    $action = $route['action'];
                    $controller->$action(); //execução dinâmica de um método
                }
            }
        }

        //obtem a url para a execução de uma ação
        protected function getUrl() {
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
    }

?>