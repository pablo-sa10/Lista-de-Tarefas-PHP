<?php
require_once '../controller/tarefasController.php';

session_start();
//print_r($_SESSION);

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../login.php');
}

$tarefaRepositorio = new TarefaController();
$dadosTarefa = $tarefaRepositorio->getTarefas();


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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body id="sucesso">
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
                <button class="btn btn-danger">SAIR</button>
            </div>
        </nav>
    </header>

    <section class="container mt-5">
        <form method="post">
            <table class="table">
                <h1 id="titulo" class="text-center my-4">Suas Tarefas</h1>
                <thead>
                    <tr class="border border-5 border-dark">
                        <th class="">TAREFA</th>
                        <th class="text-center">DATA DE ÍNICIO</th>
                        <th class="text-center">DATA FINAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dadosTarefa as $tarefa) : ?>
                        <tr class="border border-5 border-dark">
                            <td class="w-50 d-flex justify-content-between"><?= $tarefa->TAREFA ?><a class=""><i class="text-warning bi bi-caret-down-fill"></i></a></td>
                            <td class="text-center"><?= $tarefa->INICIO ?></td>
                            <td class="text-center"><?= $tarefa->FIM ?></td>
                            <td><a href="./editar.php?id= <?= $tarefa->ID ?>" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a></td>
                            <td><a href="../controller/tarefasController.php?id=<?= $tarefa->ID ?>" name="excluir" class="botao btn btn-danger"><i class="bi bi-trash"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </form>
        <div class="d-flex justify-content-center mt-4 ">
            <a href="./addTarefa.php" class="btn btn-success p-3 fs-5">Adicionar nova tarefa</a>
        </div>
    </section>

    <footer>

    </footer>
</body>

<script>
    $(document).ready(function() {

        /* const btns = document.querySelectorAll('.botao')
        btns.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.preventDefault()
                const id = e.target.closest('.botao').getAttribute("data-id");
                deletar(id);
            }) */


        function deletar(id) {

            $.ajax({
                url: "../controller/tarefasController.php",
                type: "POST",
                data: {
                    method: 'getExcluir',
                    id: id
                },
                success: function(response) {
                    console.log('Resposta do servidor:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Erro na requisição AJAX:', xhr.responseText);
                    console.log('Status:', status);
                    console.log('Erro:', error);
                }
            });
        }

    });
</script>

</html>