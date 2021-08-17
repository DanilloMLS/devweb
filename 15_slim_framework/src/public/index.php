<?php

    use Psr\Http\Message\ServerRequestInterface as Request;
    use Psr\Http\Message\ResponseInterface as Response;
    use Illuminate\Database\Capsule\Manager as Capsule;

    require '../../vendor/autoload.php';

    $app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
    ]);

    $container = $app->getContainer();
    $container['db'] = function() {
        $capsule = new Capsule();

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'slim',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => ''
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;
    };

    $app->get('/usuarios', function(Request $request, Response $response) {
        $db = $this->get('db');
        /* $db->dropIfExists('usuarios');
        $db->create('usuarios', function($table) {
            
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->timestamps();

        }); */

        //inserir
        /* $db->table('usuarios')->insert([
            'nome' => 'Danillo Moraes',
            'email' => 'danillo@email.com'
        ]); */

        //atualizar
        /* $db->table('usuarios')->where('id',1)
                            ->update([
                                'nome' => 'Danillo'
                            ]); */

        //deletar
        /* $db->table('usuarios')->where('id',1)
                            ->delete(); */

        //listar
        $usuarios = $db->table('usuarios')->get();
        foreach ($usuarios as $key => $usuario) {
            echo $usuario->nome . '<br>';
        }
        
    });

    $app->run();
    /**Middleware */
    /* $app->add(function($request, $response, $next) {
        $response->write('Início camada 1 +');
        $response = $next($request, $response);
        $response->write(' + Fim camada 1');
        return $response;
    });

    $app->add(function($request, $response, $next) {
        $response->write('Início camada 2 +');
        $response = $next($request, $response);
        $response->write(' + Fim camada 2');
        return $response;
    });

    $app->get('/usuarios', function(Request $request, Response $response) {
        $response->write('Ação principal usuários');
    });

    $app->get('/postagens', function(Request $request, Response $response) {
        $response->write('Ação principal postagens');
    }); */

    /*Respostas*/
    /* $app->get('/header', function(Request $request, Response $response) {
        $response->write('Este é um retorno header');
        return $response->withHeader('allow','PUT')
                        ->withAddedHeader('Content-Length',30);
    });

    $app->get('/json', function(Request $request, Response $response) {
        return $response->withJson([
            "nome" => "Danillo",
            "endereco" => "meu endereço"
        ]);
    });

    $app->get('/xml', function(Request $request, Response $response) {
        $xml = file_get_contents('arquivo.xml');
        $response->write($xml);

        return $response->withHeader('Content-Type','application/xml');
    }); */


    /* class Servico {

    } */

    /* Container Pimple */
    /* $container = $app->getContainer();
    $container['View'] = function() {
        return new MyApp\View;
    };

    $app->get('/servico', function(Request $request, Response $response) {
        
        $servico = $this->get('servico');
        var_dump($servico);

    }); */

    /* Controller como serviço */
    /* $app->get('/usuario', '\MyApp\controllers\Home:index'); */


    /* 
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
    }); */



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