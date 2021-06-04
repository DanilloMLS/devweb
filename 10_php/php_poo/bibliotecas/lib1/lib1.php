<?php
    namespace A;

    interface CadastroInterface {
        public function funcao();
    }

    class Cliente implements CadastroInterface{
        public $nome = 'Danillo';

        public function __construct() {
            echo '<pre>';
            print_r(get_class_methods($this));
            echo '</pre>';
        }

        public function funcao() {
            echo 'salvar';
        }

        public function metodoDeA() {
            echo 'meu método de A';
        }

        public function __get($name) {
            return $this->$name;
        }
    }
?>