<?php
    interface EquipamentoEletronicoInterface {
        //não faz sentido usar métodos não públicos
        public function ligar();
        public function desligar();
    }

    interface FuncoesBasicasInterface {
        //assinatura de método com parâmetro
        public function sintonizar($canal);
    }

    //interface que herda assinaturas de métodos de outra
    interface FuncoesAvancadasInterface extends FuncoesBasicasInterface {
        public function gravar();
    }

    //a classe que implementar a interface é obrigada a implementar os seus métodos
    class Geladeira implements EquipamentoEletronicoInterface {

        public function ligar() {
            echo 'Ligar';
        }

        public function desligar() {
            echo 'Desligar';
        }

        public function abrirPorta() {
            echo 'Abrir porta';
        }
    }

    //uma classe pode implementar mais de uma interface,
    //devando implementar todos os métodos descritos em todas as interfaces implementadas
    class TV implements EquipamentoEletronicoInterface, FuncoesBasicasInterface {
        
        public function ligar() {
            echo 'Ligar';
        }

        public function desligar() {
            echo 'Desligar';
        }

        //método de interface com parâmetro
        public function sintonizar($canal) {
            echo 'Canal '.$canal;
        }

        public function trocarCanal() {
            echo 'Trocar canal';
        }
    }

    //embora a interface FuncoesBasicas não tenha sido implementada,
    //seus métodos DEVEM ser implementados por causa da interface FuncoesAvancadas,
    //que está herdando o método sintonizar
    class TV2 implements EquipamentoEletronicoInterface, FuncoesAvancadasInterface{

        public function ligar() {
            echo 'Ligar';
        }

        public function desligar() {
            echo 'Desligar';
        }

        //método de FuncoesBasicas
        public function sintonizar($canal) {
            echo 'Canal '.$canal;
        }

        public function gravar() {
            echo 'Gravar';
        }

    }

    $g = new Geladeira();
    $t = new TV();
    $t->sintonizar(2);
?>