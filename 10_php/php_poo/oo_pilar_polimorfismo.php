<?php

    class Carro extends Veiculo {
        public $teto_solar = true;

        function __construct($placa, $cor) {
            $this->placa = $placa;
            $this->cor = $cor;
        }

        function abrirTetoSolar() {
            echo 'abrir teto solar';
        }

        function alterarPosicaoVolante() {
            echo 'alterar posição volante';
        }
    }

    class Moto extends Veiculo {
        public $contraPesoGuidao = true;

        function __construct($placa, $cor) {
            $this->placa = $placa;
            $this->cor = $cor;
        }

        function empinar() {
            echo 'empinar';
        }

        function trocarMarcha() {
            echo 'Desengatar com o mão e engatar com a pé';
        }
    }

    class Veiculo {
        public $placa = null;
        public $cor = null;

        function acelerar() {
            echo 'Acelerar';
        }

        function frear() {
            echo 'Frear';
        }

        function trocarMarcha() {
            echo 'Desengatar com o pé e engatar com a mão';
        }
    }

    $carro = new Carro('ABC1234','Branca');
    $moto = new Moto('DEF5678','Preta');

    $carro->trocarMarcha();
    echo '<br>';
    $moto->trocarMarcha();
?>