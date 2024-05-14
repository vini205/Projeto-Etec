<?php

class Usuario{

    /** 
     * id do usuário
     * @var int
     */
    private $id;

    /** @var string */
    private $nome;

    /** @var string */
    private $cpf;

    /** @var string */
    private $dataNascimento;

    /** @var string */
    private $email;

    /** @var string */
    private $senha;



/**
 * Insere dados do usuário no Banco de dados
 *
 * @return boolean
 */
    public function inserirBD(){
        
        require_once 'ConexaoBD.php';
        $conexao = new ConexaoBD();
        $conn = $conexao->conectar();
        if( $conn->connect_errno){
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT nome FROM usuario WHERE nome ='". $this->nome."'";
        $query = $conn->query($sql);
        
        $res = mysqli_fetch_assoc($query);// verifica se o nome já existe
        if ($res['nome'] == $this->nome ){
            return FALSE;
        }

        $sql = "INSERT INTO usuario (nome, cpf, email, senha)  
        VALUES ('".$this->nome."','".$this->cpf."','".$this->email."','" .$this->senha."')";
        if( $conn->query($sql)){
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        } else{
            return FALSE;
        }


    }
/**
 * Carrega dados do usuário do Banco de Dados 
 * para o objeto instanciado, fechando a conexão com o *BD* em seguida.
 *
 * @param string $cpf A variável cpf
 * @return boolean Caso `TRUE`, o id foi inserido no objeto, 
 * caso `FALSE` os daados não foram carregados.
 */
    public function carregarUsuario($cpf){
        require_once 'ConexaoBD.php';

        $conexao = new ConexaoBD();
        $conn = $conexao->conectar();
        if( $conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
         $sql = "SELECT * FROM usuario WHERE cpf = '".$cpf."'" ;
         $re = $conn->query($sql);
         $r = $re->fetch_object();
         if ($r != null){
            $this->id = $r->idusuario;
            $this->nome = $r->nome;
            $this->email = $r->email;
            $this->cpf = $r->cpf;
            $this->dataNascimento = $r->dataNascimento;
            $this->senha = $r->senha;
            $conn->close();
            return true;
         }
         else
         {
            $conn->close();
            return false;
         }
    }
    
/**
 * Atualiza os dados do Banco de Dados com os dados do 
 * objeto instanciado, em seguida fecha a conexão. 
 *
 * @return boolean Caso `TRUE` os dados foram atualizados no *BD*,
 * caso `FALSE` a atualização não foi realizada
 */
    public function atualizarBD(){
        require_once 'ConexaoBD.php';

        $conexao = new ConexaoBD();
        $conn = $conexao->conectar();
        if( $conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE usuario SET nome = '".$this->nome."', cpf = '".$this->cpf."',
        dataNascimento = '".$this->dataNascimento. "', email= 
        '" . $this->email . " ' WHERE idusuario = '". $this->id. "'";


        if( $conn->query($sql) === TRUE){
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        } else{
            return FALSE;
        }

    }

   



    // GETTERS AND SETTERS

    /**
     * Get id do usuário
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id do usuário
     *
     * @param  int  $id  id do usuário
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of dataNascimento
     */ 
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set the value of dataNascimento
     *
     * @return  self
     */ 
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}