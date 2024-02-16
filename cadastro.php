<?php

require_once "./controller/loginController.php";

$novoCadastro = new LoginController();

if(isset($_POST['enviar']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $hash = $_POST['senha'];
    $senha = password_hash($hash, PASSWORD_ARGON2ID);
    //var_dump($nome, $email, $senha);

    $cadastro = $novoCadastro->getCadastro($nome, $email, $senha);
    header('Location: ./login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #59ffa4, #a6fe58);
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body class="text-light">
    <form method="post" class="bg-dark p-5 rounded-3">
        <h2 class="text-center">Cadastro</h2>
        <div class="m-5 d-flex justify-content-between flex-column">
            <input class="p-3 mb-3 rounded-2 " name="nome" type="text" placeholder="Seu nome">
            <input class="p-3 mb-3 rounded-2 " name="email" type="email" placeholder="nome@email.com">
            <input class="p-3 mb-3 rounded-2" name="senha" type="password" placeholder="Senha">
            <button name="enviar" class="p-3 mb-3 btn btn-primary rounded-2">Cadastrar</button>
            <a href="./login.php" class="p-3 btn btn-danger rounded-2">Cancelar</a>
        </div>
    </form>
</body>

</html>