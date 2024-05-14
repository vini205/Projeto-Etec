<?php

class ExperienciaProfissional{

    /** @var int 
     * Id de `experienciaPrifissional`
    */
    private $id;

    /** @var int */
    private $idusuario;

    /** @var string 
    * No Banco de Dados esse campo é do
    * tipo `DATE`,  a data do início da experiência
    */
    private $inicio;

    /** @var string 
    * No Banco de Dados esse campo é do
    * tipo `DATE`,  a data do fim da experiência
    */
    private $fim;

    /** @var string */
    private $empresa;

    /** @var string */
    private $descricao;

    /**
     * Insere dados do usuário no Banco de dados
     * @return boolean Retorna `TRUE` caso haja sucesso e `FALSE`
     * caso contrário.
     */
    public function inserirBD(){
        require_once 'ConexaoBD.php';

        $conexao = new ConexaoBD();
        $conn = $conexao->conectar();
        if( $conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO experienciaprofissional ( idusuario, inicio, fim, empresa, descricao) 
        VALUES ('".$this->idusuario."','".$this->inicio."','" .$this->fim."', '". $this->empresa."','". $this->descricao ."')";
            
        echo $sql;
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

        $sql = "DELETE FROM experienciaprofissional WHERE idexperienciaprofissional = '".$id."';";

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
     * @return object Caso `TRUE` os dados foram atualizados no *BD*,
     * caso `FALSE` a atualização não foi realizada.
     */
    public function listarExperiencias($idusuario)
    {
        require_once 'ConexaoBD.php';

        $conexao = new ConexaoBD();
        $conn = $conexao->conectar();
        if( $conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM experienciaprofissional WHERE idusuario = '". $idusuario."'";

        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }
    

    
    

    

    // GETTERS and SETTERS

    

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

    /**
     * Get the value of empresa
     */ 
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set the value of empresa
     *
     * @return  self
     */ 
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

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
     * Get the value of idusuario
     */ 
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set the value of idusuario
     *
     * @return  self
     */ 
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}