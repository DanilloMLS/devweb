<?php
    class Exemplo {
        public static $atributo1 = 'atributo estático'; //não acessível com "->"
        public $atributo2 = 'atributo normal';

        //não pode usar o $this e não precisa de instância da classe
        public static function metodo1() { 
            echo 'método estático';
        }

        public function metodo2() {
            echo 'método normal';
        }
    }

    //acesso ao método estático
    Exemplo::metodo1();

    //acesso ao atributo estático
    echo Exemplo::$atributo1;
?>