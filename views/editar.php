<?php
require_once '../model/tarefas.php';
require_once '../controller/tarefasController.php';


if(isset($_FILES['enviar'])){
    $tarefa = new Tarefa(
        null,
        $_POST['tarefa'],
        $_POST['descricao'],
        $_POST['inicio'],
        $_POST['fim']
    );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tarefa</title>

    <!-- style -->
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

        <form method="post" class="container mt-5 border border-dark px-5 py-3 col-md-6">
            <h2 class="my-1 text-center">Editar tarefa</h2>
            <div class="divInputAdd my-3">
                <label for="tarefa">Novo Nome:</label>
                <input name="tarefa" class="inputAdd"  type="text">
            </div>

            <div class="divInputAdd">
                <label for="descricao">Nova Descrição</label>
                <textarea name="descricao" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="divInputAdd mt-3">
                <div class="mb-3">
                    <label for="inicio">Nova Data de Ínicio:</label>
                    <input name="inicio" type="date">
                </div>
                <div>
                    <label for="fim">Nova Data de Meta:</label>
                    <input name="fim" type="date">
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <button name="enviar" class="btn btn-success">Confirmar</button>
                <a href="./index.php" class="btn btn-danger mx-3">Cancelar</a>
            </div>
        </form>
</body>

</html>