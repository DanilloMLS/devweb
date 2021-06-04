<?php
    class Pai {
        private $nome = 'Jorge';
        protected $sobrenome = 'Silva';
        public $humor = 'Feliz';

        //essas funções acessam os atributos correspondetes
        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            if (strlen($nome) >= 3) {
                $this->nome = $nome;
            }
        }

        //essas funções mágicas acessam os atributos independente da
        //visibilidade dentro da classe correspondente
        //não é necessário chamá-los
        /* public function __get($name) {
            return $this->$name;
        }
        
        public function __set($name, $value) {
            $this->$name = $value;
        } */

        //os modificadores afetam as funções do mesmo jeito que o atributos
        private function executarMania() {
            echo 'Mania';
        }

        protected function responder() {
            echo 'Responder';
        }

        public function executarAcao() {
            echo 'Ação';
        }
    }

    //atributos private NÃO são herdados
    class Filho extends Pai{

        public function __construct() {
            echo '<pre>';
            print_r(get_class_methods($this));
            echo '</pre>';
        }

        public function getAtributo($attr) {
            return $this->$attr;
        }

        public function setAtributo($attr, $value) {
            $this->$attr = $value;
        }
    }

    /* $pai = new Pai();
    echo $pai->__get('nome');
    echo '<br>';
    $pai->sobrenome = 'qweqwe';
    echo $pai->__get('sobrenome'); */

    $filho = new Filho();

    //print_r($filho);

    echo $filho->getAtributo('humor');
    echo '<br>';
    $filho->setAtributo('humor','triste');
    echo $filho->getAtributo('humor');
    echo '<br>';

    //exibir relação dos métodos de um objeto
    /* echo '<pre>';
    print_r(get_class_methods($filho));
    echo '</pre>'; */
?>