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

        public function __get($name) {
            return $this->$name;
        }
    }
    
    //por estar presente no namespace A, o nome ainda precisa ser diferente,
    //mas é a interface do namespace B que será implementada
    class Cliente2 implements \B\CadastroInterface{
        
        public $nome = 'Lima';

        public function __construct() {
            echo '<pre>';
            print_r(get_class_methods($this));
            echo '</pre>';
        }

        public function funcao() {
            echo 'alterar';
        }

        public function __get($name) {
            return $this->$name;
        }
    }

    //namespace B
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

        public function __get($name) {
            return $this->$name;
        }
    }

    //por estar abaixo do namespace B, é a classe Cliente do namespace B a acessada
    $cliente = new Cliente();
    print_r($cliente);
    echo '<br>' . $cliente->funcao();

    echo '<hr>';

    //mas se referenciarmos o namespace em questão, a classe usada é a do namespace indicado
    $cliente2 = new \A\Cliente;
    print_r($cliente2);
    echo '<br>' . $cliente2->funcao();

    echo '<hr>';

    //a classe está no namespace A, mas implementa a interface do namespace B
    $cliente3 = new \A\Cliente2;
    print_r($cliente3);
    echo '<br>' . $cliente3->funcao();
?>