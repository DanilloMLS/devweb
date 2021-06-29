<?php

    require 'tarefa.model.php';
    require 'tarefa.service.php';
    require 'conexao.php';

    $acao = (isset($_GET['acao'])) ? $_GET['acao'] : $acao ;
    
    if ($acao == 'inserir') {
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa',$_POST['tarefa']);
        
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();

        //parâmetro via método get
        header('Location: nova_tarefa.php?inclusao=1');
    } else if ($acao == 'recuperar') {
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
    } else if ($acao == 'atualizar') {
        $tarefa = new Tarefa();
        $tarefa->__set('id',$_POST['id']);
        $tarefa->__set('tarefa',$_POST['tarefa']);
        
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        if ($tarefaService->atualizar()) {
            if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
                header('Location: index.php?atualizacao=1');
            } else {
                header('Location: todas_tarefas.php?atualizacao=1');
            }
        }
    } else if ($acao == 'remover') {
        /* echo 'Vamos remover '.$_GET['id']; */
        $tarefa = new Tarefa();
        $tarefa->__set('id',$_GET['id']);
        
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();
        
        if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
            header('Location: index.php?remover=1');
        } else {
            header('Location: todas_tarefas.php?remover=1');
        }
        
    } else if ($acao == 'marcarRealizada') {
        /* echo 'Oi '.$_GET['id']; */
        $tarefa = new Tarefa();
        $tarefa->__set('id',$_GET['id']);
        $tarefa->__set('id_status',2);

        $conexao = new Conexao();
        
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcarRealizada();
        
        if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
            header('Location: index.php');
        } else {
            header('Location: todas_tarefas.php');
        }
        
    } else if ($acao == 'recuperarPendente') {
        echo 'Oi ';
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperarPendente();
    }
?>