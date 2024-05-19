<?php
if(!isset($_SESSION))
{

    session_start();
}

/**
 * Controler do usuário, realiza operações com o usuário.
 */
class UsuarioController{


   /**
    * Insere os dados no usuário no banco.
    * É criada um sessão com os dados do usuário.
    * 
    * @param [type] $nome
    * @param [type] $cpf
    * @param [type] $email
    * @param [type] $senha
    * @return bool
    */
    public function inserir($nome, $cpf, $email,$senha) {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setCPF($cpf);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        $r = $usuario->inserirBD();
        if($r != false){
            $_SESSION['Usuario'] = serialize($usuario);
        }
        /* Para finalizar, serializamos o objeto. Com essa ação, será possível sua alocação na sessão, tornando
possível a transferência de dados entres as páginas. Assim, finalizamos o método com o retorno. */
        return $r;
    }


    /**
     * Atualiza os dados do usuário
     *
     * @param [type] $id
     * @param [type] $nome
     * @param [type] $cpf
     * @param [type] $email
     * @param [type] $dataNascimento
     * @return bool
     */
    public function atualizar($id, $nome, $cpf, $email, $dataNascimento) {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->setNome($nome);
        $usuario->setCPF($cpf);
        $usuario->setEmail($email);
        $usuario->setDataNascimento($dataNascimento);
        $r = $usuario->atualizarBD();
        $_SESSION['Usuario'] = serialize($usuario);
        if($r != false){
            $_SESSION['Usuario'] = serialize($usuario);
        }
        return $r;
    }


    /**
     * Faz o login do usuário
     *
     * @param [type] $cpf
     * @param [type] $senha
     * @return bool
     */
    public function login($cpf, $senha)
    {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->carregarUsuario($cpf);
        $verSenha=$usuario->getSenha();
        if($senha==$verSenha && $verSenha != ''){
            $_SESSION['Usuario'] = serialize($usuario);
            return true;
        }
        else{
            return false;
        }
    }


    /**
     * Gera uma requisição para o Model usuário para
     * listar os usuários
     *
     * @return object
     */
    public function gerarLista()
    {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();

        return $results = $usuario->listaCadastrados();
    }

    /**
     * Gera uma requisição para a Model usuário
     * para pegar os dados de um único usuário via Id.
     * 
     *
     * @param [type] $id
     * @return object
     */
    public function listarDados($id){
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();

        return $results = $usuario->listarDados($id);
    }

}

