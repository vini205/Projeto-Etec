<?php
if(!isset($_SESSION))
{
session_start();
}

/**
 * terá a função de controlar o fluxo dos dados referentes à formação
 * acadêmica.
 */
class FormacaoAcadController{

    /**
     * Insere os dados no bd
     * tem a função de instanciar um objeto da classe Formação Acadêmica, denominado
    * “FormacaoAcad” e inserir os dados em sua respectiva tabela.
     *
     * @param [type] $inicio
     * @param [type] $fim
     * @param [type] $descricao
     * @param [type] $idusuario
     * @return bool
     */
    public function inserir($inicio, $fim, $descricao,$idusuario) {
        require_once '../Model/FormacaoAcad.php';
        $formacao = new FormacaoAcad();
        $formacao->setInicio($inicio);
        $formacao->setFim($fim);
        $formacao->setDescricao($descricao);
        $formacao->setIdUsuario($idusuario);
        $r = $formacao->inserirBD();
        
        return $r;
        }

        /**
         * s. Esse método realiza um delete de dados
         * na tabela formação acadêmica por meio de um parâmetro.
         *
         * @param [type] $id
         * @return bool
         */
        public function remover($id) {
            require_once '../Model/FormacaoAcad.php';
            $formacao = new FormacaoAcad();
            $r = $formacao->excluirBD($id);
            return $r;
        }

        /**
         * Com esse método e uma instância de FormacaoAcad,
         * teremos disponível a lista de formação acadêmica
         *  do usuário logado no sistema de currículo.
         *
         * @param [type] $idusuario
         * @return object
         */
        public function gerarLista($idusuario){
            require_once '../Model/FormacaoAcad.php';
            $formacao = new FormacaoAcad();
            return $results = $formacao->listarFormacoes($idusuario);
            }
}