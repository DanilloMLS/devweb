<?php
    //o Composer usa o Autoload PSR-4 para não precisarmos usar require ou require_once
    //em cada arquivo, mas é necessário usar namespaces
    namespace App\Controllers;
    
    class IndexController {
        public function index() {
            echo 'Chegamos ao IndexController e disparamos a action index';
        }

        public function sobreNos() {
            echo 'Chegamos ao IndexController e disparamos a action sobreNos';
        }
    }
    

?>