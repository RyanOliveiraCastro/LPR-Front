<?php

namespace LPR\view;

use LPR\Controller\ClienteController;
use LPR\Controller\CaixaController;
use LPR\Controller\FuncionarioController;
use LPR\Controller\OSController;
use LPR\Controller\ProteticoController;

require __DIR__ . '/../vendor/autoload.php';
@session_start();
if(empty($_SESSION['cliente_id']) && empty($_SESSION['funcionario_id']) && empty($_SESSION['protetico_id'])) {
    header('Location: login ');
    //Mandar para Login
}else if(!empty($_SESSION['cliente_id'])){
    header('Location: servico');
}

$clienteController = new ClienteController();
$caixaController = new CaixaController();
$funcionarioController = new FuncionarioController();
$proteticoController = new ProteticoController();
$osController = new OSController();

$url = $_SERVER['QUERY_STRING'];
$url = explode("/", $url);
$id = (count($url) <= 2) ? null : $url[2];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Ordem Serviço</title>
    <meta charset="utf-8">
    <link href="<?=URL_BASE . '/assets/css.css'?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap">

</head>
<body>

<header>
    <ul>
        <a href="../cadastro">
            <li class="Menu"><i class="fas fa-bars"></i></li>
        </a>
        <li class="title">Ordem Serviço</li>
        <li class="adicionar">
            <button form="formId" type="submit" style="background-color: transparent; border: 1px solid transparent">
                <i class="fas fa-check fa-3x"></i>
            </button>
        </li>
    </ul>
</header>

<main>
    <form id="formId" action="../osInserir" method="post">
        <div class="inputs">

            <label>ID</label>
            <input id="id" placeholder="Id" name="nId" type="text" readonly="readonly" value="<?= $id == null ? "" : $id?>">
            <label>Dentista</label>
            <?php $clienteController->selectClienteAlterar(); ?>
            <label for="paciente">Paciente
                <input id="paciente" name="nPaciente" placeholder="Paciente" type="text" readonly="readonly">
            </label>
            <label>Caixa</label>
            <select id="listCaixa" name="nCaixa" readonly="readonly" tabindex="-1" aria-disabled="true">
                <?php $caixaController->selectCaixaNotUsed(); ?>
            </select>
            <label>Serviço</label>
            <select id="listServico" name="nServico" readonly="readonly">
                <?php //$tipoServicoController->selectTipoServico();
                ?>
            </select>
            <input id="servicoId" name="nServicoId" style="display:none" >
            <label for="entrega">Previsão de Entrega
                <input id="entrega" name='nEntrega' placeholder="Data Entrega" type="date">
            </label>
            <label>Funcinário</label>
            <select id="listFuncionario" name="nFuncionario" readonly="readonly">
                <?php $funcionarioController->selectFuncionario(); ?>
            </select>
            <select id="listProtetico" name="nProtetico" readonly="readonly">
                <?php $proteticoController->selectProtetico(); ?>
            </select>

            <label>Situação</label>
            <select id="listStatus" name="nStatus" required>
                <?php //$servicoController->selectStatus();
                ?>
                <option value="RECEBIDA">RECEBIDA</option>

            </select>
            <label for="observacao">Observação
                <input id="observacao" name="nObservacao" placeholder="Observação" type="text" readonly="readonly">
            </label>

        </div>
    </form>

    <footer>
        <ul>
            <a href="../perfil">
                <li class="user"><i class="fas fa-user"></i></li>
            </a>
            <a href="../servico">
                <li class="servico"><i class="fas fa-eye"></i></li>
            </a>
            <a href="../os">
                <li class="adicionar"><i class="fas fa-plus"></i></li>
            </a>
        </ul>

    </footer>


</main>


<script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
<script src="<?= URL_BASE . '/assets/js/jquery-3.5.0.min.js'?>"></script>
<script src="<?= URL_BASE . '/assets/js/ordemServicoAlterar.js'?>"></script>
</body>
</html>