<?php
 if (!isset($_SESSION)) {
     session_start();
 }
class AdministradorController{

    /**
     * O administrador deve realizar o login com seu CPF e senha 
     * cadastrados para conseguir acesso ao painel administrativo
     *
     * @param [type] $cpf
     * @param [type] $senha
     * @return bool
     */
    public function login($cpf, $senha)
    {
    require_once '../Model/Administrador.php';
    $administrador = new Administrador();
    $administrador->carregarAdministrador($cpf);
    if($administrador->getSenha() == $senha)
    {
    $_SESSION['Administrador'] = serialize($administrador);
    return true;
    }
    else
    {
    return false;
    }
    }

  
    
    /**
     * Gera uma requisição para o Model administrador para
     * listar os administradores
     *
     * @return object
     */
    public function gerarLista()
        {
        require_once '../Model/Administrador.php';
       
        $u = new Administrador();
       
        return $results = $u->listaCadastrados();
        }
        
    
   }