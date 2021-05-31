<?php
  require_once "validador_acesso.php";
  //print_r($_SESSION);
?>

<?php
  $chamados = array();
  //abrir o arquivo.hd
  $arquivo = fopen('../../app_help_desk/arquivo.hd','r');

  //feof checa as linha de $arquivo até encontrar um PHP_EOL
  while (!feof($arquivo)) {
    $registro = fgets($arquivo);
    $registro_dados = explode('#',$registro);

    if ($_SESSION['perfil_id'] == 2) {
      if ($_SESSION['id'] != $registro_dados[0]) {
        continue;
      }
    }

    $chamados[] = $registro;
    
    /* echo '<pre>';
    var_dump($registro);
    echo '</pre>'; */
  }

  //fechar o arquivo aberto
  fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php foreach ($chamados as $chamado) { ?>
                <?php
                  //para acessar os campos de um chamado individualmente
                  $chamado_dados = explode('#',$chamado);

                  //somente os chamados do usuário logado serão listados
                  //mas se for o administrador, todos devem ser listados
                  /* if ($_SESSION['perfil_id'] == 2) {
                    if ($_SESSION['id'] != $chamado_dados[0]) {
                      continue;
                    }
                  } */
                  
                  //se $chamado_dados tiver algum dos campos em falta, então um card não será criado
                  if (count($chamado_dados) < 3) {
                    continue;
                  }
                ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                    <p class="card-text"><?= $chamado_dados[3] ?></p>

                  </div>
              </div>
              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>