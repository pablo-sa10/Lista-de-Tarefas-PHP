<?php

require_once '../model/tarefas.php';
require_once '../controller/tarefasController.php';

$tarefaRepositorio = new TarefaController();

$tarefa = $_POST['tarefa'];
$descricao = $_POST['descricao'];
$fim = $_POST['fim'];
if(isset($_FILES['enviar'])){
    $dadosTarefa = $tarefaRepositorio->getAdiciona($tarefa, $descricao, $fim);  
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tarefas</title>
    <!--Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <header>
        <nav class="navbar py-4 navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <form method="post" class="container mt-5 col-md-6 border border-5 border-dark">
        <h2 class="text-center">Nova Tarefa</h2>
        <div class="divInputAdd">
            <label class="fs-5" for="tarefa">Tarefa:</label>
            <input class="inputAdd w-75" name="tarefa" type="text">
        </div>
        <div>
            <p class="mt-5">Descrição:</p>
            <textarea class="w-100" name="descricao" rows="10"></textarea>
        </div>
        <div>
            <p>Data de ínicio: <input type="date" name="inicio"></p>
            <p>Meta até: <input type="date" name="fim"></p>
        </div>
        <div class="d-flex justify-content-center mt-5 mb-3">
            <button name="enviar" class="btn border btn-primary">Confirmar</button>
            <a href="./index.php" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</body>

</html>