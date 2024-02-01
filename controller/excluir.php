<?php

if(isset($_GET['id']) && !empty($_GET['id'])){

    require_once '../controller/conexao.php';
    require_once '../controller/tarefasController.php';

    $conexao = new Conexao;
    $pdo = $conexao->getConexao();

    $tarefaRepositorio = new Repositorio($pdo);
    $delete = $tarefaRepositorio->getExcluir($_GET['id']);
    header("Location: ../views/index.php");
}

?>