<?php

require_once '../model/conexao.php';

class Tarefa
{
    private $id;
    private $tarefa;
    private $descricao;
    private $inicio;
    private $fim;

    public function __construct($id = null, $tarefa = "", $descricao = "", $inicio = null, $fim = "")
    {
        $this->id = $id;
        $this->tarefa = $tarefa;
        $this->descricao = $descricao;
        $this->inicio = $inicio;
        $this->fim = $fim;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setID($tarefa)
    {
        $this->tarefa = $tarefa;
    }

    public function getTarefa()
    {
        return $this->tarefa;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getInicio()
    {
        return $this->inicio;
    }

    public function getFim()
    {
        return $this->fim;
    }


    public function getAdiciona($tarefa, $descricao, $fim){
        $db = new Conexao();
        $db = $db->getConexao();

        try {
            $sql = "INSERT INTO tarefas 
            (TAREFA, DESCRICAO, INICIO, FIM)
            VALUES (:tarefa, :descricao, GETDATE(), :dataFim)";

            $busca = $db->prepare($sql);
            $busca->bindValue("tarefa", $tarefa, PDO::PARAM_STR);
            $busca->bindValue("descricao", $descricao, PDO::PARAM_STR);
            $busca->bindValue("dataFim", $fim);
            $busca->execute();

            $resultado = $busca->fetchAll(PDO::FETCH_OBJ);
            $busca->closeCursor();

        } catch (PDOException $ex) {

            //EXIBE MENSAGEM AMIGAVEL PARA USUÁRIO
            echo "<a  href='" . $_SERVER['PHP_SELF'] . "'> 
                <div class='text-center alert alert-danger ' role='alert'>
                    <h4 class='alert-heading'> <span class='fas fa-exclamation-triangle'></span>Atenção:<h4>
                    <hr/>
                    Erro de Consulta! $ex
                    <h6>Notifique seu superior ou departamento de Tecnologia</h6>
                </div>
            </a>";
            exit(); //NÃO DEIXA CONTINUAR A EXECUÇÃO
        }
        return $resultado;
    }
}
