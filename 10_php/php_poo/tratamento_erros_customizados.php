<?php

    class MinhaException extends Exception {
        private $erro = '';

        public function __construct($erro) {
            $this->erro = $erro;
        }

        public function exibirErroCustomizado() {
            echo '<div style="border: solid 1px #000; padding: 15px; background-color: red; color: white; ">';
            echo $this->erro;
            echo '</div>';
        }
    }

    try {
        throw new MinhaException('Erro');
    } catch (MinhaException $e) {
        $e->exibirErroCustomizado();
    }
?>