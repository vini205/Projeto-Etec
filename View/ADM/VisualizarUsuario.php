<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo de Usuário</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
</head>
<body>
    <?php 
         session_start();
         include_once '../Model/Usuario.php';
         include_once '../Controller/UsuarioController.php';
         include_once '../Controller/FormacaoAcadController.php';
         include_once '../Controller/ExperienciaProfissionalController.php';
         include_once '../Controller/OutrasFormacoesController.php';
         define('__ROOT__', '/content/projeto_etec_final');
         if(!isset($_SESSION))
         {
            echo 'Não Logado';
         }
         define('__ROOT__', '/content/projeto_etec_final');
         $id =  $_POST['id'];
         $usuario = new UsuarioController();
         $dados = $usuario->listarDados($id);
         $dados = $dados->fetch_assoc();
    ?>


     <header class="w3-container w3-padding-32 w3-center " >
        <h1 class="w3-text-white w3-panel w3-blue w3-round-large">
       Dados do Usuário: <?= $dados['nome']; ?>
        </h1>
    </header>

    
    <div class="w3-container w3-padding-32 w3-center w3-blue " style="font-size:2em;">
        <div class="w3-row ">
            <div class="w3-col m6">
                Nome: 
            </div>
            <div class="w3-col m6 w3-white">
                
            <?= $dados['nome']; ?>
            </div>
        </div>
        <div class="w3-row">
            <div class="w3-col m6">CPF:</div>
            <div class="w3-col m6 w3-white"><?= $dados['cpf']; ?></div>
        </div>
        <div class="w3-row">
            <div class="w3-col m6">Email</div>
            <div class="w3-col m6 w3-white"><?= $dados['email']; ?></div>
        </div>
        <div class="w3-row">
            <div class="w3-col m6">Data de Nascimento:</div>
            <div class="w3-col m6 w3-white"><?= $dados['datanascimento']; ?></div>
        </div>
    </div>     
        <div class="w3-content">
            <h2 class="w3-text-blue">Formação Acadêmica</h2>
            <div class="w3-section">
                <table class="w3-table-all w3-centered">
                    <thead>
                        <tr class="w3-center darkblue">
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        $fCon = new FormacaoAcadController();
                        $results = $fCon->gerarLista($id);
                        if($results != null)
                        while($row = $results->fetch_object()) {
                            echo '<tr>';
                            echo '<td style="width: 10%;">'.$row->inicio.'</td>';
                            echo '<td style="width: 10%;">'.$row->fim.'</td>';
                            echo '<td style="width: 65%;">'.$row->descricao.'</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w3-content">
            <h2 class="w3-text-blue">Experiência Profissional</h2>
            <table class="w3-table-all w3-centered">
                <thead>
                <tr class="w3-center darkblue">
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Empresa</th>
                    <th>Descrição</th>
               
                </thead>
                <tbody>
                
                <?php 
          
                $ePro = new ExperienciaProfissionalController();
            
                $results = $ePro->gerarLista($id);
                if($results != null){
                    while($row = $results->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 10%;">'.$row->inicio.'</td>'; 
                        echo '<td style="width: 10%;">'.$row->fim.'</td>';
                        echo '<td style="width:10%;">'.$row->empresa.'</td>';
                        echo '<td style="width: 65%;">'.$row->descricao.'</td>';
                        echo '</tr>';
                    }

                }
                ?>
                </tbody>
            </table>
        </div> 
        <div class="w3-content">
        <h2 class="w3-text-blue">Outras formações</h2>
            <table class="w3-table-all w3-centered">
                <thead>
                <tr class="w3-center darkblue">
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Descrição</th>
               
                </thead>
                <tbody>
                

                <?php 

                $oF = new OutrasFormacoesController();
                $results = $oF->gerarLista($id  );
                if($results != null){
                    while($row = $results->fetch_object()) {
                        
                        echo '<tr>';
                        echo '<td style="width: 10%;">'.$row->inicio.'</td>'; 
                        echo '<td style="width: 10%;">'.$row->fim.'</td>';
                        echo '<td style="width: 65%;">'.$row->descricao.'</td>';
                        echo '</tr>';
                    }

                }
                ?>
                </tbody>
            </table>
        
    </div>
    </div>

    <form action="<?= '../Controller/Navegacao.php'?>" method="post" class="w3-container w3-light-grey w3-text-blue w3-margin w3-center" style="width:auto;">
        <div class="w3-row w3-section">
            <div>
            <button name="btnVoltarLista" class="w3-button w3-block w3-margin w3-blue w3-cell w3-roundlarge" style="width: 90%;">
            Voltar
            </button>
            </div>
        </div>
    </form>

    </div>
</body>
</html>