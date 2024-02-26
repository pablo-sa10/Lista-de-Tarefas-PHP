<?php

require_once "../model/Tarefa.php";

/*  $id = (isset($_GET['id'])) ? $_GET['id'] : "";
if($id == $_GET['id']){
    $tarefa = new TarefaController;
    $tarefa->getExcluir($id);
    header('Location: http://10.10.2.99/Projetos_Pessoais/Lista%20de%20tarefas/views/index.php');
}
  */
class TarefaController
{

    public function getAdiciona($tarefa, $descricao, $fim)
    {

        return (new Tarefa)->getAdiciona($tarefa, $descricao, $fim);
    }

    public function getTarefas()
    {
        return (new Tarefa)->getTarefas();
    }

    public function getIdTarefa($id)
    {
        return (new Tarefa)->getIdTarefas($id);
    }

    public function getEdita($id, $tarefa, $descricao, $inicio, $fim)
    {
        return (new Tarefa)->getEdita($id, $tarefa, $descricao, $inicio, $fim);
    }

    public function getExcluir($id)
    {
        //$id = $_POST['id'];
        return (new Tarefa())->getExcluir($id);
    }

}
