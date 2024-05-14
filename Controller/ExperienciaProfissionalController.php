<?php
if(!isset($_SESSION))
{
session_start();
}
class ExperienciaProfissionalController{

    /**
     * Insere uma formação profissional no banco de dados
     *
     * @param [type] $inicio
     * @param [type] $fim
     * @param [type] $empresa
     * @param [type] $descricao
     * @param [type] $idusuario
     * @return bool
     */
    public function inserir($inicio, $fim, $empresa, $descricao,$idusuario) {
    require_once '../Model/ExperienciaProfissional.php';
    $expP = new ExperienciaProfissional();
    $expP->setInicio($inicio);
    $expP->setFim($fim);
    $expP->setEmpresa($empresa);
    $expP->setDescricao($descricao);
    $expP->setIdUsuario($idusuario);
    $r = $expP->inserirBD();
    return $r;
    }

    /**
     * Remove uma experiência profissional do Banco
     *
     * @param [type] $id
     * @return bool
     */
    public function remover($id) {
    require_once '../Model/ExperienciaProfissional.php';
    $expP = new ExperienciaProfissional();
    $r = $expP->excluirBD($id);
    return $r;
    }

    /**
     * Gera uma lista das experiencias professionais, baseada
     * no id do usuário.
     *
     * @param [type] $idusuario
     * @return object
     */
    public function gerarLista($idusuario)
    {
        
    require_once '../Model/ExperienciaProfissional.php';
    $expP = new ExperienciaProfissional();
    return $results = $expP->listarExperiencias($idusuario);
    }
}
