
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(to right, #59ffa4, #a6fe58);
        font-family: Arial, Helvetica, sans-serif;
    }

    .hide{
        display: none;
    }
</style>

<body>
    <form action="./controller/verifica.php" method="post" class="bg-dark col-lg-4 col-md-6 rounded-3 container p-5">
        <div class="mx-5 py-5 d-flex justify-content-between flex-column">
            <!-- <p id="msg" class="hide text-danger "><i>Preencha todos os campos!</i></p> -->
            <h1 class="text-white">Login</h1>
            <input class="p-3 mb-3 rounded-2 " name="email" type="email" placeholder="nome@email.com">
            <input class="p-3 mb-3 rounded-2" name="senha" type="password" placeholder="senha">
            <button id="botao" name="enviar" class="mb-3 p-3 btn btn-primary rounded-2">Entrar</button>
            <p class="my-2 text-light text-center">Crie uma conta agora!</p>
            <a href="./cadastro.php" class="p-3 btn btn-primary rounded-2">Cadastre-se</a>
        </div>
    </form>
</body>

<script>
    $(document).ready(()=>{
        /* $('#botao').click((e)=>{
            $('#msg').show();
        }) */
    })
</script>

</html>