<?php

    class Dashboard {
        public $data_inicio;
        public $data_fim;
        public $numero_vendas;
        public $total_vendas;
        public $clientes_ativos;
        public $clientes_inativos;
        public $total_reclamacoes;
        public $total_elogios;
        public $total_sugestoes;
        public $total_despesas;

        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
            return $this;
        }
    }

    class ConexaoDB {
        private $host = 'localhost';
        private $dbname = 'dashboard';
        private $user = 'root';
        private $pass = '';

        public function conectar()
        {
            try {
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );

                $conexao->exec('set charset utf8');
                return $conexao;
            } catch (PDOException $e) {
                echo '<p>'.$e->getMessage().'</p>';
            }
        }
    }

    class BD {
        private $conexao;
        private $dashboard;

        public function __construct(ConexaoDB $conexao, Dashboard $dashboard)
        {
            $this->conexao = $conexao->conectar();
            $this->dashboard = $dashboard;
        }

        public function getNumeroVendas() {
            $query = "select
                        count(*) as numero_vendas
                        from
                        tb_vendas
                        where data_venda between :data_inicio and :data_fim";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':data_inicio',$this->dashboard->__get('data_inicio'));
            $stmt->bindValue(':data_fim',$this->dashboard->__get('data_fim'));
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
        }

        public function getTotalVendas() {
            $query = "select
                        sum(total) as total_vendas
                        from
                        tb_vendas
                        where data_venda between :data_inicio and :data_fim";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':data_inicio',$this->dashboard->__get('data_inicio'));
            $stmt->bindValue(':data_fim',$this->dashboard->__get('data_fim'));
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
        }

        public function getClientesAtivos() {
            $query = "select
                        count(*) as clientes_ativos
                        from
                        tb_clientes
                        where cliente_ativo = 1";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->clientes_ativos;
        }

        public function getClientesInativos() {
            $query = "select
                        count(*) as clientes_inativos
                        from
                        tb_clientes
                        where cliente_ativo = 0";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->clientes_inativos;
        }

        public function getReclamacoes() {
            $query = "select
                        count(*) as total_reclamacoes
                        from
                        tb_contatos
                        where tipo_contato = 1";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->total_reclamacoes;
        }

        public function getElogios() {
            $query = "select
                        count(*) as total_elogios
                        from
                        tb_contatos
                        where tipo_contato = 2";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->total_elogios;
        }

        public function getSugestoes() {
            $query = "select
                        count(*) as total_sugestoes
                        from
                        tb_contatos
                        where tipo_contato = 3";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->total_sugestoes;
        }

        public function getTotalDespesas() {
            $query = "select
                        sum(total) as total_despesas
                        from
                        tb_despesas
                        where data_despesa between :data_inicio and :data_fim";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':data_inicio',$this->dashboard->__get('data_inicio'));
            $stmt->bindValue(':data_fim',$this->dashboard->__get('data_fim'));
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ)->total_despesas;
        }
    }

    $dashboard = new Dashboard();
    $conexao = new ConexaoDB();
    $competencia = explode('-',$_GET['competencia']);
    $ano = $competencia[0];
    $mes = $competencia[1];

    //para descobrir quantos dias há no mês
    $dias_do_mes = cal_days_in_month(CAL_GREGORIAN,$mes,$ano);
    $dashboard->__set('data_inicio',$ano.'-'.$mes.'-01');
    $dashboard->__set('data_fim',$ano.'-'.$mes.'-'.$dias_do_mes);
    
    //chamamos as consultas aqui
    $bd = new BD($conexao, $dashboard);
    $dashboard->__set('numero_vendas',$bd->getNumeroVendas());
    $dashboard->__set('total_vendas', $bd->getTotalVendas());
    $dashboard->__set('clientes_ativos',$bd->getClientesAtivos());
    $dashboard->__set('clientes_inativos',$bd->getClientesInativos());
    $dashboard->__set('total_reclamacoes',$bd->getReclamacoes());
    $dashboard->__set('total_elogios',$bd->getElogios());
    $dashboard->__set('total_sugestoes',$bd->getSugestoes());
    $dashboard->__set('total_despesas',$bd->getTotalDespesas());

    //print_r($_GET);
    //print_r($dashboard);
    echo json_encode($dashboard);

?>