<?php
    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $usuario = 'root';
    $senha = '';
    

    try {
        $conexao = new PDO($dsn,$usuario,$senha);

        //se a tabela existir, o comando será ignorado pelo PDO
        /* $query = '
            create table tb_usuarios(
                id int not null primary key auto_increment,
                nome varchar(50) not null,
                email varchar(100) not null,
                senha varchar(32) not null
            )
        ';

        $query = '
                insert into tb_usuarios (nome, email,senha)
                values ("Danillo","danillo@email.com","123456")
        ';

        $retorno = $conexao->exec($query);
        echo $retorno; */

        /* $query = '
                select * from tb_usuarios
        ';
        $stmt = $conexao->query($query);
        $lista = $stmt->fetchAll();

        echo '<pre>';
        print_r($lista);
        echo '</pre>';

        echo $lista[0]['nome']; //Danillo
        echo $lista[0][1]; //Danillo */

        /* $query = '
                select * from tb_usuarios
        ';
        $stmt = $conexao->query($query);
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC); //associativo
        echo '<pre>';
        print_r($lista);
        echo '</pre>';

        $query = '
                select * from tb_usuarios
        ';
        $stmt = $conexao->query($query);
        $lista = $stmt->fetchAll(PDO::FETCH_NUM); //numerico
        echo '<pre>';
        print_r($lista);
        echo '</pre>';

        $query = '
                select * from tb_usuarios
        ';
        $stmt = $conexao->query($query);
        $lista = $stmt->fetchAll(PDO::FETCH_BOTH); //ambos
        echo '<pre>';
        print_r($lista);
        echo '</pre>'; */

        /* $query = '
                select * from tb_usuarios
        ';
        $stmt = $conexao->query($query);
        $lista = $stmt->fetchAll(PDO::FETCH_OBJ); //object
        echo '<pre>';
        print_r($lista);
        echo '</pre>';

        echo $lista[1]->nome; */

        /* $query = '
                select * from tb_usuarios where id = 2
        ';
        $stmt = $conexao->query($query);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        echo '<pre>';
        print_r($usuario);
        echo '</pre>';

        echo $usuario['nome']; */

        $query = '
                select * from tb_usuarios
        ';
        /* $stmt = $conexao->query($query);
        $lista_usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($lista_usuarios as $key => $usuario) {
            //print_r($usuario);
            echo $usuario['nome'];
            echo '<hr>';
        } */

        foreach ($conexao->query($query) as $key => $usuario) {
            echo $usuario['nome'];
            echo '<hr>';
        }

    } catch (\PDOException $e) {
        echo 'Erro: '.$e->getCode().' Mensagem: '.$e->getMessage();
    }
?>