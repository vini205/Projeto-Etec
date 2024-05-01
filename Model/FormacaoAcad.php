<?php

class FormacaoAcad
{

    /** @var int
     * o código único de cada registro
     * de formação acadêmica
     */
    private $id;

    /** @var int 
     * o código do usário a quem pertence essa formação
    */
    private $idusuario;

    /** @var string
     * No Banco de Dados esse campo é do
     * tipo `DATE`,  a data do início da formação
     */
    private $inicio;        

    /** @var string
     * No Banco de Dados esse campo é do
     * tipo `DATE`, é a data do fim da formação
     */
    private $fim;

    /** @var string */
    private $descricao;

    
    

/**
 * Insere dados do usuário no Banco de dados
 * @return boolean Retorna `TRUE` caso haja sucesso e `FALSE`
 * caso contrário.
 */
public function inserirBD(){
    require_once 'ConexaoBD.php';

    $conexao = new ConexaoBd();
    $conn = $conexao->conectar();
    if( $conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO formacaoAcademica (idusuario, inicio, fim, descricao) 
    VALUES (' ".$this->idusuario."'.'".$this->inicio."'.'".$this->fim."'.'" .$this->descricao."')";


    if( $conn->query($sql) === TRUE){
        $this->id = mysqli_insert_id($conn);
        $conn->close();
        return TRUE;
    } else{
        return FALSE;
    }
}
    
 /**
     * Usa o parâmetro `id` para deletar um registro.
     *
     * @param [int] $id
     * @return boolean Caso `TRUE` os dados foram atualizados no *BD*,
     * caso `FALSE` a atualização não foi realizada
     */
    public function excluirBD($id)
    {
        require_once 'ConexaoBD.php';

        $conexao = new ConexaoBD();
        $conn = $conexao->conectar();
        if( $conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM formacaoAcademica WHERE idformacaoAcademica = '".$id."';";

        if( $conn->query($sql) === TRUE){
            $conn->close();
            return TRUE;
        } else{
            return FALSE;
        }

    }

    /**
     * Lista as formações baseada em um
     * parâmetro `idusuario`.
     * Retorna um ou mais regristros como resultado da query.
     *
     * @param [int] $idusuario
     * @return boolean Caso `TRUE` os dados foram atualizados no *BD*,
     * caso `FALSE` a atualização não foi realizada.
     */
    public function listarFormacoes($idusuario)
    {
        require_once 'ConexaoBD.php';

        $conexao = new ConexaoBD();
        $conn = $conexao->conectar();
        if( $conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM formacaoAcademica WHERE idusuario = '". $idusuairo."'";

        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }

    
    
    // GETTERS and SETTERS

    /**
     * Get o código único de cada registro
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set o código único de cada registro
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get o código do usário a quem pertence essa formação
     */ 
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set o código do usário a quem pertence essa formação
     *
     * @return  self
     */ 
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get no Banco de Dados esse campo é do
     */ 
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * Set no Banco de Dados esse campo é do
     *
     * @return  self
     */ 
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * Get no Banco de Dados esse campo é do
     */ 
    public function getFim()
    {
        return $this->fim;
    }

    /**
     * Set no Banco de Dados esse campo é do
     *
     * @return  self
     */ 
    public function setFim($fim)
    {
        $this->fim = $fim;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
}
