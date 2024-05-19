<?php

/**
 * A classe Administrador será responsável por
 *  gerenciar os dados dos administradores do
 * nosso projeto
 */
class Administrador{
 private $id;
 private $nome;
 private $cpf;
 private $senha;


/**
 * Carrega os dados do usuário administrador pelo CPF
 * Execução da sentença com verificação do sucesso ou não
 *
 * @param [type] $cpf
 * @return bool
 */
 public function carregarAdministrador($cpf){
    require_once 'ConexaoBD.php';

    $con = new ConexaoBD();
    $conn = $con->conectar();
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM administrador WHERE cpf = '".$cpf."'" ;
    $re = $conn->query($sql);
    $r = $re->fetch_object();
    if($r != null)
    {
        $this->id = $r->idadministrador;
        $this->nome = $r->nome;
        $this->cpf = $r->cpf;
        $this->senha = $r->senha;
        $conn->close();
        return true;
    }else{
        $conn->close();
        return false;
    }
    }

    /**
     * Método que realiza a listagem dos administradores 
     * cadastrados
     *
     * @return object
     */
    public function listaCadastrados()
    {
    require_once 'ConexaoBD.php';
   
    $con = new ConexaoBD();
    $conn = $con->conectar();
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT idadministrador, nome, cpf FROM administrador;" ;
    $re = $conn->query($sql);
    $conn->close();
    return $re;
    }


 // GETTTERS ans SETTERS 
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