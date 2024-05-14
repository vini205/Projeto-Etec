<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial- scale=1.0"> <meta httpequiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Pagina Principal</title>
    <style>
        /* Definimos que a sidebar terá uma largura de 120px e cor a cord de fundo #222 */
        .w3-sidebar {
        width: 120px;
        }
        /*Define Fonte para todas as tags listadas abaixo*/body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
        font-family: "Montserrat",sans-serif
        }
        .darkblue{
            background-color: #2b00ff;
        }
        .darkbluetext:hover{
            color: blue !important;
        }
        .darkblueText{
            color: #2b00ff !important;
        }
        .w3-hover-light-grey:hover{
            color:#2b00ff !important;
        }
    </style>
</head>
<body class="w3-light-grey">
    <?php 
    include_once 'Model/Usuario.php';
    include_once '../Controller/FormacaoAcadController.php';
    include_once '../Controller/ExperienciaProfissionalController.php';
    include_once '../Controller/OutrasFormacoesController.php';
    define('__ROOT__', '/content/projeto_etec_final');

    if(!isset($_SESSION))
    {
        
        session_start();
    }
    ?>
<nav class="w3-sidebar w3-bar-block w3-center darkblue ">
    <a href="#home" class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>HOME</p>
    </a>
    <a href="#dPessoais" class="w3-bar-item w3-button w3-block  w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
        <i class="fa fa-address-book w3-xxlarge"></i>
        <p>Dados Pessoais</p>
    </a>
    <a href="#formacao" class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
        <i class="fa fa-mortar-board w3-xxlarge"></i>
        <p>Formação</p>
    </a>
    <a href="#eProfissional" class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
        <i class="fa-solid fa-briefcase w3-xxlarge"></i>
        <p>Experiência Profissinal</p>
    </a>
    <a href="#eOutrasInformacoes" class="w3-bar-item w3-button w3-block n w3-cell w3-hover-light-grey w3-hover-text-cyan w3-text-light-grey">
        <i class="fa-solid fa-plus w3-xxlarge"></i>
        <p>Outras Informações</p>
    </a>

</nav>
    <div class="w3-padding-large" id="main">
    <header class="w3-container w3-padding-32 w3-center " id="home">
        <h1>
            <img src="../img/logo.png" alt="Logo" class="w3-image" width="10%">
            </br>
        </h1>
        <h1 class="darkblueText">SISTEMA DE CURRICULOS</h1>
    </header>

    <div class="w3-padding-128 w3-content w3-text-grey w3-center" id="dPessoais">
        <h2 class="darkblueText">Dados Pessoais</h2>
        <form action="/Controller/Navegacao.php" method="post" class="w3-row w3-light-grey darkblueText w3-margin" >
            <input class="w3-input w3-border w3-round-large" name="txtID" type="hidden" value="<?php echo unserialize($_SESSION['Usuario'])->getID();?>" > 

            
            
            
            <!-- Para cada atributo value dos inputs utilizaremos o objeto serializado na seção para realizar a
            inserção dos dados -->
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:11%;">
                    <i class="w3-xxlarge fa fa-user"></i>
                </div>
                <div class="w3-rest w3-margin-bottom">
                    <input class="w3-input w3-border w3-round-large" name="txtNome" type="text" value="<?php echo unserialize($_SESSION['Usuario'])->getNome();?>" > 
                </div>
             
                    <div class="w3-col" style="width:11%; ">
                    <i class="w3-xxlarge fa fa-id-card"></i></div>
                    <div class="w3-rest w3-margin-bottom">
                        
                        <input class="w3-input w3-border w3-round-large" name="CPF" type="text" value="<?= unserialize($_SESSION['Usuario'])->getCpf()?>" > 
                    </div>
               
           
                    <div class="w3-col" style="width:11%; ">
                    <i class="w3-xxlarge fa fa-calendar-days"></i></div>
                    <div class="w3-rest w3-margin-bottom">
                        <input class="w3-input w3-border w3-round-large" name="dataNascimento" type="text" value="<?php echo unserialize($_SESSION['Usuario'])->getDataNascimento();?>" > 
                    </div>
              
                    <div class="w3-col" style="width:11%; ">
                    <i class="w3-xxlarge fa fa-envelope"></i></div>
                    <div class="w3-rest w3-margin-bottom">
                        <input class="w3-input w3-border w3-round-large" name="email" type="text" value="<?php echo unserialize($_SESSION['Usuario'])->getEmail();?>" > 

                    </div>
              
                
                </div>
            </div>
        </form>
    </div>
    <div class="w3-padding-128 w3-content w3-text-grey w3-center" id="formacao">
        <h2 class="darkblueText">Formação</h2>
        <form action="" method="post" class=" w3-row w3-light-grey darkblueText w3-margin" >
            <div class="w3-row w3-center">
                <div class="w3-col" style="width:50%;">
                Data Inicial
                </div>
                <div class="w3-res" style="">
                Data Final
                </div>
            </div>
            <div class="w3-row w3-section w3-col" style="width:45%;">
                <div class="w3-col" style="width:15%;">
                <i class="w3-xxlarge fa fa-calendar"></i>
                </div>
                <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large"
                name="txtInicioFA" type="date" placeholder="">
                </div>
            </div>
            <div class="w3-row w3-section w3-rest" style = "">
                <div class="w3-col w3-margin-left" style="width:13%;">
                <i class="w3-xxlarge fa fa-calendar"></i>
                </div>
                <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="txtFimFA" type="date"
                placeholder="">
                </div>
            </div>
          
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:7%;">
                <i class="w3-xxlarge fa fa-align-justify"></i>
                </div>
                <div class="w3-rest">
                <input class="w3-input w3-border w3-round-large" name="txtDescFA" type="text"
                placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas - Centro Paula Souza">
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-center" style="">
                <button name="btnAddFormacao" class="w3-button w3-block darkblueText  w3-cell w3-round-large" style=" background-color:lightblue;width: 20%;">

                <i class="w3-xxlarge fa fa-user-plus"></i>
                </button>
                </div>
            </div>
            <div class="w3-section">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center darkblue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                            <th>Apagar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        $fCon = new FormacaoAcadController();
                        $results = $fCon->gerarLista(unserialize($_SESSION['Usuario'])->getId());
                        if($results != null)
                        while($row = $results->fetch_object()) {
                            echo '<tr>';
                            echo '<td style="width: 10%;">'.$row->inicio.'</td>';
                            echo '<td style="width: 10%;">'.$row->fim.'</td>';
                            echo '<td style="width: 65%;">'.$row->descricao.'</td>';
                            echo '<td style="width: 5%;">
                            <form action="'.__ROOT__.'/Controller/Navegacao.php" method="post">
                            <input type="hidden" name="id" value="'.$row->idformacaoAcademica.'">
                            <button name="btnExcluirFA" class="w3-button w3-block w3-blue
                            w3-cell w3-round-large"> <i class="fa fa-user-times"></i> </button></td>
                            </form>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <div class="w3-padding-128 w3-content w3-text-grey w3-center" id="eProfissional">
        <h2 class="darkblueText">Experiência Profissional</h2>
        <div class="w3-content">
        
            <form action=" " method="post" class=" w3-row w3-light-grey darkblueText w3-margin">
                <div class="w3-row w3-center">
                    <div class="w3-col" style="width:50%;">
                    Data Inicial
                    </div>
                    <div class="w3-res" style="">
                    Data Final
                    </div>
                </div>
                <div class="w3-row w3-section w3-col" style="width:45%;">
                    <div class="w3-col" style="width:15%;">
                    <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large"
                    name="txtInicioEP" type="date" placeholder="">
                    </div>
                </div>
                <div class="w3-row w3-section w3-rest" style="">
                    <div class="w3-col w3-margin-left" style="width:13%;">
                    <i class="w3-xxlarge fa fa-calendar"></i>
                    </div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large" name="txtFimEP"
                    type="date" placeholder="">
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:7%;">
                    <i class="w3-xxlarge fa fa-align-justify"></i>
                    </div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large" name="txtEmpEP"
                    type="text" placeholder="Centro Paula Souza">
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-col" style="width:7%;">
                    <i class="w3-xxlarge fa fa-align-justify"></i>
                    </div>
                    <div class="w3-rest">
                    <input class="w3-input w3-border w3-round-large" name="txtDescEP"
                    type="text" placeholder="Descrição: Ex.: Técnico em Desenvolvimento de Sistemas -
                    Desenvolvimento de Páginas WEB">
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-center" style="">
                        <button name="btnAddEP" class="w3-button w3-block darkblueText w3-cell
                        w3-round-large" style="background-color:lightblue; width: 20%;">
                        <i class="w3-xxlarge fa fa-user-plus"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="w3-content">
            <table class="w3-table-all w3-centered">
                <thead>
                <tr class="w3-center darkblue">
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Empresa</th>
                    <th>Descrição</th>
                    <th>Apagar</th>
               
                </thead>
                <tbody>
                

                <?php 
          
                $ePro = new ExperienciaProfissionalController();
            
                $results = $ePro->gerarLista(unserialize($_SESSION['Usuario'])->getId());
                if($results != null){
                    while($row = $results->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 10%;">'.$row->inicio.'</td>'; 
                        echo '<td style="width: 10%;">'.$row->fim.'</td>';
                        echo '<td style="width:10%;">'.$row->empresa.'</td>';
                        echo '<td style="width: 65%;">'.$row->descricao.'</td>';
                        echo '<td style="width: 5%;"> <form action="'.__ROOT__.'/Controller/Navegacao.php" method="post">
                        <input type="hidden" name="idEP" value="'.$row->idexperienciaprofissional.'">
                        <button name="btnExcluirEP" class="w3-button w3-block w3-blue w3-cell w3-round-large"> 
                        <i class="fa fa-user-times"></i> </button></td></form>';
                        echo '</tr>';
                    }

                }
                ?>
                </tbody>
            </table>
        </div> 
    </div>

    <div class="w3-padding-128 w3-content w3-text-grey w3-center" id="eOutrasInformacoes">
        <h2 class="darkblueText">Outras informações</h2>
        <div class="w3-content">
        
            <form action="" method="post" class="w3-row w3-light-grey darkblueText w3-margin" >
                <div class="w3-row w3-section">
                    <input class="w3-input w3-border w3-round-large" name="txtInicioOF" type="date"value="">
                </div>
                <div class="w3-row w3-section">
                    <input class="w3-input w3-border w3-round-large" name="txtFimOF" type="date"value="">
                </div>
                <div class="w3-row w3-section">
                    <input class="w3-input w3-border w3-round-large" name="txtdescOF" type="text"placeholder="Descrição" value="">
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-center" style="">
                        <button name="btnAddOF" class="w3-button w3-block darkblueText w3-cell
                        w3-round-large" style="background-color:lightblue; width: 20%;">
                        <i class="w3-xxlarge fa fa-user-plus"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="w3-content">
            <table class="w3-table-all w3-centered">
                <thead>
                <tr class="w3-center darkblue">
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Descrição</th>
                    <th>Apagar</th>
               
                </thead>
                <tbody>
                

                <?php 

                $oF = new OutrasFormacoesController();
                $results = $oF->gerarLista(unserialize($_SESSION['Usuario'])->getId());
                if($results != null){
                    while($row = $results->fetch_object()) {
                        
                        echo '<tr>';
                        echo '<td style="width: 10%;">'.$row->inicio.'</td>'; 
                        echo '<td style="width: 10%;">'.$row->fim.'</td>';
                        echo '<td style="width: 65%;">'.$row->descricao.'</td>';
                        echo '<td style="width: 5%;"> <form action="'.__ROOT__.'/Controller/Navegacao.php" method="post">
                        <input type="hidden" name="idOF" value="'.$row->idoutrasformacoes.'">
                        <button name="btnExcluirOF" class="w3-button w3-block w3-blue w3-cell w3-round-large"> 
                        <i class="fa fa-user-times"></i> </button></td></form>';
                        echo '</tr>';
                    }

                }
                ?>
                </tbody>
            </table>
        
    </div>
</body>
</html>