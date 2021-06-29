<?php
	$acao = 'recuperar';
	require 'tarefa_controller.php';
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
		<script>
			//método para edição de tarefa
			function editar(id, txtTarefa) {

				//formulário para alteração da tarefa, método: post
				let form = document.createElement('form');
				form.action = 'tarefa_controller.php?acao=atualizar';
				form.method = 'post';
				form.className = 'row';

				//campo hidden para o id da tarefa
				let idTarefa = document.createElement('input');
				idTarefa.type = 'hidden';
				idTarefa.name = 'id';
				idTarefa.value = id;

				//campo texto para o novo nome da tarefa
				let inputTarefa = document.createElement('input');
				inputTarefa.type = 'text';
				inputTarefa.name = 'tarefa';
				inputTarefa.className = 'form-control col-9';
				inputTarefa.value = txtTarefa;

				//botão submit
				let botao = document.createElement('button');
				botao.type = 'submit';
				botao.className = 'btn btn-info col-3';
				botao.innerHTML = 'Ok';

				//inclusão dos elementos no form
				form.appendChild(idTarefa);
				form.appendChild(inputTarefa);
				form.appendChild(botao);

				//apresentação do form na página
				let tarefa = document.getElementById('tarefa_'+id);
				tarefa.innerHTML = '';
				tarefa.insertBefore(form, tarefa[0]);
			}

			function remover(id) {
				
				location.href = 'tarefa_controller.php?acao=remover&id='+id;
			}

			function marcarRealizada(id) {
				/* alert('OI '+id); */
				location.href = 'tarefa_controller.php?acao=marcarRealizada&id='+id;
			}
		</script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<?php
			if (isset($_GET['atualizacao']) && $_GET['atualizacao'] == 1) {
		?>
		<div class="bg-success pt-2 text-white d-flex justify-content-center">
			<h5>Tarefa atualizada com sucesso!</h5>
		</div>
		<?php			
			}
		?>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<?php foreach ($tarefas as $key => $tarefa) { ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
											<?= $tarefa->tarefa ?> (<?= $tarefa->status ?>)
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
											
											<?php if ($tarefa->status == 'pendente') { ?>
												<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
												<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
											<?php } ?>

										</div>
									</div>
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>