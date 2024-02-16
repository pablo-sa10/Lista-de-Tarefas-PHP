<?php

require_once dirname(__DIR__) . "/model/Login.php";

class LoginController{

    public function getLogin($email, $senha){
        return (new Login)->getLogin($email, $senha);
    }

    public function getCadastro($nome, $email, $senha){
        return (new Login)->getCadastro($nome, $email, $senha);
    }

};
//print_r($_REQUEST);

?>