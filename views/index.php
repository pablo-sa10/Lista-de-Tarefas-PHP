<?php

require_once '../model/conexao.php';
require_once '../controller/tarefasController.php';
require_once '../controller/tarefas.php';

$tarefaRepositorio = new TarefaController();
$dadosTarefa = $tarefaRepositorio->getAdiciona();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista De Tarefas</title>
    <!--Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--Js -->
    <script src="../assets/main.js"></script>
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

    <section class="container mt-5">
        <form method="post">
            <table class="table">
                <h1 class="text-center my-4">Suas Tarefas</h1>
                <thead>
                    <tr class="border border-5 border-dark">
                        <th class="text-center">ID</th>
                        <th class="">TAREFA</th>
                        <th class="text-center">DATA DE ÍNICIO</th>
                        <th class="text-center">DATA FINAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dadosTarefa as $tarefa) : ?>
                        <tr class="border border-5 border-dark">
                            <td><?= $tarefa->getId() ?></td>
                            <td class="w-50"><?= $tarefa->getTarefa() ?></td>
                            <td class="text-center"><?= $tarefa->getInicio() ?></td>
                            <td class="text-center"><?= $tarefa->getFim() ?></td>
                            <td><a href="./editar.php" <?= $tarefa->getId() ?> class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a></td>
                            <td><a href="../controller/excluir.php?id=<?= $tarefa->getId() ?>" name="excluir" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </form>
        <div class="d-flex justify-content-center mt-4 ">
            <a href="addTarefa.php" class="btn btn-success p-3 fs-5">Adicionar nova tarefa</a>
        </div>
    </section>

    <footer>

    </footer>
</body>

</html>