<?php
    class Pessoa {
        public $nome = null;

        //construtor: iniciado sempre que um objeto é instanciado
        function __construct($nome) {
            //echo 'Objeto iniciado';
            $this->nome = $nome;
        }

        //destrói o objeto
        function __destruct() {
            echo 'Objeto removido';
        }

        function __get($name) {
            return $this->$name;
        }

        function correr() {
            return $this->__get('nome') . ' está correndo';
        }
    }

    $pessoa = new Pessoa('Fulano');
    echo $pessoa->__get('nome');
    echo '<br>' . $pessoa->correr();
    echo '<br>';
    unset($pessoa);
    echo '<br>' . $pessoa->correr();
?>