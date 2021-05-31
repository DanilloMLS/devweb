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
    }

    $carro = new Carro('ABC1234','Branca');
    $moto = new Moto('DEF5678','Preta');

    echo '<pre>';
    print_r($carro);
    echo '</pre>';

    echo '<br>';

    echo '<pre>';
    print_r($moto);
    echo '</pre>';

    echo '<hr>';
    $carro->acelerar();
?>