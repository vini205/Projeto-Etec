<?php
if(!isset($_SESSION))
{
session_start();
}
class OutrasFormacoesController{

    /**
     * Insere uma *outra formações* no banco de dados
     *
     * @param [type] $inicio
     * @param [type] $fim
     * @param [type] $descricao
     * @param [type] $idusuario
     * @return bool
     */
    public function inserir($inicio, $fim, $descricao,$idusuario) {
    require_once '../Model/OutrasFormacoes.php';
    $outraF = new OutrasFormacoes();
    $outraF->setInicio($inicio);
    $outraF->setFim($fim);
    $outraF->setDescricao($descricao);
    $outraF->setId_usuario($idusuario);
    $r = $outraF->inserirBD();
    return $r;
    }

    /**
     * Remove uma ocorrência do Banco
     *
     * @param [type] $id
     * @return bool
     */
    public function remover($id) {
    require_once '../Model/OutrasFormacoes.php';
    $outraF = new OutrasFormacoes();
    $r = $outraF->excluirBD($id);
    return $r;
    }

    /**
     * Gera uma lista de outras formações, baseada
     * no id do usuário.
     *
     * @param [type] $idusuario
     * @return object
     */
    public function gerarLista($idusuario)
    {
    require_once '../Model/OutrasFormacoes.php';
    $outraF = new OutrasFormacoes();
    return $results = $outraF->listarFormacoes($idusuario);
    }
}
