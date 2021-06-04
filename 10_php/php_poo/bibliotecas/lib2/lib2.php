<?php
    namespace B;

    interface CadastroInterface {
        public function funcao();
    }

    class Cliente implements CadastroInterface{
        public $nome = 'Santos';

        public function __construct() {
            echo '<pre>';
            print_r(get_class_methods($this));
            echo '</pre>';
        }

        public function funcao() {
            echo 'remover';
        }

        public function metodoDeB() {
            echo 'meu método de B';
        }

        public function __get($name) {
            return $this->$name;
        }
    }
?>