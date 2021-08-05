<?php

    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;

    require '../../vendor/autoload.php';

    $app = new \Slim\App;

    //get: recuperar dados do servidor
    $app->get('/postagens', function(Request $request, Response $response) {
        $response->getBody()->write('Lista de postagens');
        return $response;
    });

    //post: criar dado no servidor
    $app->post('/usuarios/adiciona', function(Request $request, Response $response) {
        //recuperação dos dados
        $post = $request->getParsedBody();
        $nome = $post['nome'];
        $email = $post['email'];

        //salvar dados no banco

        return $response->getBody()->write($nome." ".$email);
    });

    //put: atualiza informações no servidor
    $app->put('/usuarios/atualiza', function(Request $request, Response $response) {
        $post = $request->getParsedBody();
        $nome = $post['nome'];
        $email = $post['email'];

        //atualiza dados no banco

        return $response->getBody()->write('Sucesso ao atualizar');
    });

    //delete: apaga dados do banco
    $app->delete('/usuarios/remove/{id}', function(Request $request, Response $response) {
        $post = $request->getAttribute('id');
        return $response->getBody()->write("Sucesso ao deletar ".$post);
    });

    $app->run();

    /* $app->get('/', function() {
        echo "Home";
    });

    $app->get('/postagem', function() {
        echo "Lista postagens";
    });

    //rota com parâmetro obrigatório
    $app->get('/usuarios/{id}', function($request, $response) {
        $id = $request->getAttribute('id');
        echo "Lista usuários: ". $id;
    });

    //rota com parâmetro opcional
    $app->get('/pessoas[/{id}]', function($request, $response) {
        //verificações podem ser feitas verificando a existência de um usuário
        $id = $request->getAttribute('id');
        echo "Lista pessoas: ". $id;
    });

    //os dois parâmetros são opcionais, mas se apenas um for colocado, será armazenado em ano
    $app->get('/postagens[/{ano}[/{mes}]]', function($request, $response) {
        $mes = $request->getAttribute('mes');
        $ano = $request->getAttribute('ano');
        echo "Lista postagens do ano ".$ano." mês ".$mes;
    });

    //passagem de uma lista de parâmetros, o que vem depois do dois pontos é uma expressão regular
    $app->get('/lista/{itens:.*}', function($request, $response) {
        $itens = $request->getAttribute('itens');
        //echo $itens;
        var_dump(explode('/',$itens));
    });

    //rota com nome, pode ser acessada por outra rota
    $app->get('/blog/postagens/{id}', function($request, $response) {
        $id = $request->getAttribute('id');
        echo "Listar postagens para o ID ".$id;
    })->setName('blog');

    $app->get('/meusite', function($request, $response) {
        $retorno = $this->get("router")->pathFor("blog", ['id'=>'5']);
        echo $retorno;
    });

    //agrupamento de rotas
    $app->group('/v1', function() {
        $this->get('/usuarios', function() {
            echo "Listagem usuários";
        });

        $this->get('/postagens', function() {
            echo "Listagem postagens";
        });

        $this->get('/teste/{id}', function($request, $response) {
            $id = $request->getAttribute('id');
            echo "Teste ".$id;
        });
    }); */

    

?>