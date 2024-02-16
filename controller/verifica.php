<?php
session_start();
require_once './loginController.php';
$entrou = new LoginController();

if (isset($_POST['enviar']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $login = $entrou->getLogin($email, $senha);

    if (!empty($login)) {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: ../views/index.php?=OlaPablo');
    } else {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../login.php');
    }
} else {
    header('Location: ../login.php');
}

?>