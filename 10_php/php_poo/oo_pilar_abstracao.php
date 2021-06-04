<?php
    class Funcionario {

        //atributos
        public $nome = null;
        public $telefone = null;
        public $numFilhos = null;
        public $cargo = null;
        public $salario = null;

        //overloading
        function __set($name, $value) {
            $this->$name = $value;
        }

        function __get($name) {
            return $this->$name;
        }

        //setters
        /* function setNome($nome) {
            $this->nome = $nome;
        }

        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        function setNumFilhos ($numFilhos) {
            $this->numFilhos = $numFilhos;
        } */

        //getters
        /* function getNome() {
            return $this->nome;
        }

        function getTelefone() {
            return $this->telefone;
        }

        function getNumFilhos() {
            return $this->numFilhos;
        } */

        //métodos
        function resumirCadFunc() {
            return $this->__get('nome') . " possui " . $this->__get('numFilhos') . " filhos.";
        }

        function modificarNumfilhos($numFilhos) {
            $this->numFilhos = $numFilhos;
        }
    }

    $y = new Funcionario();
    $y->__set('nome','José');
    $y->__set('numFilhos',2);
    echo $y->resumirCadFunc();
    //echo $y->__get('nome') . ' possui ' . $y->__get('numFilhos') . ' filhos';

    echo '<br>';

    $x = new Funcionario();
    $x->__set('nome','Maria');
    $x->__set('numFilhos',3);
    echo $x->resumirCadFunc();
    //echo $x->__get('nome') . ' possui ' . $x->__get('numFilhos') . ' filhos';
?>