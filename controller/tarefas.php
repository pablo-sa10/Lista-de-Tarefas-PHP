<?php

class Tarefa{
    private $id;
    private $tarefa;
    private $descricao;
    private $inicio;
    private $fim;

    public function __construct($id = null, $tarefa, $descricao, $inicio, $fim)
    {
        $this->id = $id;
        $this->tarefa = $tarefa;
        $this->descricao = $descricao;
        $this->inicio = $inicio;
        $this->fim = $fim;
    }

    public function getId(){
        return $this->id;
    }

    public function setID($tarefa){
        $this->tarefa = $tarefa;
    }

    public function getTarefa(){
        return $this->tarefa;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getInicio(){
        return $this->inicio;
    }

    public function getFim(){
        return $this->fim;
    }
}

?>