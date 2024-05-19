<?php

if(!isset($_SESSION))
{
session_start();
}
//echo 'Navegation';

switch ($_POST) {
    case isset($_POST[null]):

        include_once "View/login.php";
    break;
    case isset($_POST['btnCadNaoRealizado']):
    case isset($_POST['btnCadRealizado']):
    case isset($_POST['btnInfinserir']):
    case isset($_POST['btnInfExcluir']):
    case isset($_POST['btnOperacaoNRealizada']):
    case isset($_POST['btnOperacaoNRealizada']):
        
        include_once "../View/login.php";
        break;
    //---Primeiro Acesso--//
    case isset($_POST["btnPrimeiroAcesso"]):
        include_once "../View/primeiroAcesso.php";
        break;
        //---Cadastrar--//
    case isset($_POST["btnCadastrar"]):
        require_once "UsuarioController.php";
        $uController = new UsuarioController();
        if ($uController->inserir(
        $_POST["txtNome"],
        $_POST["txtCPF"],
        $_POST["txtEmail"],
        $_POST["txtSenha"]
        )){
            include_once "../View/secundarios/atualizacaoRealizada.php";
        } else {
            include_once "../View/secundarios/cadastroNaoRealizado.php";
        }
        /* Neste código instanciamos um objeto UsuarioController e realizamos a chamada do método inserir
(que iremos programar a seguir) dentro de um desvio condicional, passando as informações diretamente
dos inputs preenchidos pelo usuário para o objeto usuário e tentando realizar a persistência dos dados.  */
        break;


    //--Atualizar--//
    case isset($_POST["btnAtualizar"]):
        require_once "../Controller/UsuarioController.php";
        $uController = new UsuarioController();
        if ($uController->atualizar(
        $_POST["txtID"],
        $_POST["txtNome"],
        $_POST["txtCPF"],
        $_POST["txtEmail"],
        date("Y-m-d", strtotime($_POST["txtData"]))
        )
        ) {
        include_once "../View/atualizacaoRealizada.php";
        } else {
        include_once "../View/operacaoNaoRealizada.php";
        }
        break;
    
        /*LOGIN*/
    case isset($_POST["btnLogin"]):
        require_once "../Controller/UsuarioController.php";
        $uController = new UsuarioController();
        if ($uController->login($_POST["txtLogin"], $_POST["txtSenha"])) {
        include_once "../View/principal.php";
        } else {
        include_once "../View/secundarios/cadastroNaoRealizado.php";
        }
        break;
    
    //--Adicionar Formacao--//
    case isset($_POST["btnAddFormacao"]):
        require_once "../Controller/FormacaoAcadController.php";
        include_once "../Model/Usuario.php";
        $fController = new FormacaoAcadController();
        if ($fController->inserir(
            date("Y-m-d", strtotime($_POST["txtInicioFA"])),
            date("Y-m-d", strtotime($_POST["txtFimFA"])),
            $_POST["txtDescFA"],
            unserialize($_SESSION["Usuario"])->getId()
            )) {
            include_once "../View/secundarios/cadastroRealizado.php";
        } else {
            include_once "../View/secundarios/cadastroNaoRealizado.php";
        }
        break;
    //--Excluir Formacao-//
    case isset($_POST["btnExcluirFA"]):
        require_once "../Controller/FormacaoAcadController.php";
        include_once "../Model/Usuario.php";
        $fController = new FormacaoAcadController();
        
        if ($fController->remover($_POST["id"])) {
            
            include_once "../View/secundarios/informacaoExcluida.php";
        } else {
            include_once "../View/secundarios/operacaoNaoRealizda.php";
        }
        break;

    //--Adicionar Experiencia Profissional-//
    case isset($_POST["btnAddEP"]):
        require_once "../Controller/ExperienciaProfissionalController.php";
        include_once "../Model/Usuario.php";
        $epController = new ExperienciaProfissionalController();
        
        if ($epController->inserir(
        date("Y-m-d", strtotime($_POST["txtInicioEP"])),
        date("Y-m-d", strtotime($_POST["txtFimEP"])),
        $_POST["txtEmpEP"],
        $_POST["txtDescEP"],
        unserialize($_SESSION["Usuario"])->getId()
        )){
            include_once "../View/secundarios/informacaoInserida.php";
        } else {
            include_once "../View/secundarios/operacaoNRealizada.php";
        }
        break;
    //--Excluir Experiencia Profissional-//
    case isset($_POST["btnExcluirEP"]):
        require_once "../Controller/ExperienciaProfissionalController.php";
        include_once "../Model/Usuario.php";
        $epController = new ExperienciaProfissionalController();
        if ($epController->remover($_POST["idEP"])) {
            include_once "../View/secundarios/informacaoExcluida.php";
        } else {
            include_once "../View/secundarios/operacaoNaoRealizada.php";
        }
        break;

        // OUTRAS FORMACOES
    case isset($_POST["btnAddOF"]):
        require_once "../Controller/OutrasFormacoesController.php";
        require_once "../Model/Usuario.php";
        $outrasFormacoes = new OutrasFormacoesController();
        
        if($outrasFormacoes->inserir(
            date("Y-m-d", strtotime($_POST["txtInicioOF"])),
            date("Y-m-d", strtotime($_POST["txtFimOF"])),
            $_POST["txtdescOF"],
            unserialize($_SESSION["Usuario"])->getId()
        )){
            include_once "../View/secundarios/informacaoInserida.php";
        } else{
            include_once "../View/secundarios/operacaoNaoRealizada.php";
        }
        break;
    case isset($_POST['btnExcluirOF']):
        require_once  "../Controller/OutrasFormacoesController.php";
        require_once "../Model/Usuario.php";
        $oFController = new OutrasFormacoesController();
        
        if ($oFController->remover($_POST["idOF"])) {
            include_once "../View/secundarios/informacaoExcluida.php";
        } else {
            include_once "../View/secundarios/operacaoNaoRealizada.php";
        }
        break;

            /*LOGIN ADM*/
    case isset($_POST["btnLoginADM"]):
        require_once '../Controller/AdministradorController.php';
        $aController = new AdministradorController();
        
        if($aController->login($_POST['txtLoginADM'], $_POST['txtSenhaADM']))
        {
            include_once '../View/ADM/ADMPrincipal.php';
        }else{
            include_once "../View/secundarios/cadastroNaoRealizado.php";
        }  
        break;

     case(isset($_POST["btnADM"])):
        include_once '../View/ADM/ADMLogin.php';
     break;
     case isset($_POST["btnListarCadastrados"]):
        case isset($_POST['btnVoltarLista']):
        include_once '../View/ADM/ListarCadastrados.php';
        break;
    case isset($_POST["btnListarAdministradores"]):
        include_once '../View/ADM/ADMListarAdministradores.php';
        break;
    case isset($_POST['btnVoltar']):
        include_once '../View/ADM/ADMPrincipal.php';

        break;
    case isset($_POST['btnVisualizarUsuario']):
        
        include_once '../View/ADM/VisualizarUsuario.php';
        break;

    }
