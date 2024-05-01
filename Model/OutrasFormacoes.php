<?php

class OutrasFormações{

    /** @var int */
    private $id;

    /** @var int */
    private $id_usuario;

    /** @var string 
    * No Banco de Dados esse campo é do
    * tipo `DATE`, é a data do fim da formação
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

    $sql = "INSERT INTO outrasformacoes (idoutrasformacoes,idusuario, inicio, fim, descricao) 
    VALUES (' ".$this->id."'.'".$this->id_usuario."'.'".$this->inicio."'.'" .$this->fim."','". $this->descricao ."')";


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

        $sql = "DELETE FROM outrasformacoes WHERE idoutrasformacoes = '".$id."';";

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

        $sql = "SELECT * FROM outrasformacoes WHERE idusuario = '". $idusuairo."'";

        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }
    

    // GETTERS and SETTERS

    /**
     * Get the value of idoutrasformacoes
     */ 
    public function getIdoutrasformacoes()
    {
        return $this->id;
    }

    /**
     * Set the value of idoutrasformacoes
     *
     * @return  self
     */ 
    public function setIdoutrasformacoes($id)
    {
        $this->idoutrasformacoes = $id;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

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