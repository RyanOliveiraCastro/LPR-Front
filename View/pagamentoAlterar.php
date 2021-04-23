<?php

namespace LPR\view;

use LPR\Controller\ServicoController;

require __DIR__ . '/../vendor/autoload.php';
@session_start();
if(empty($_SESSION['cliente_id']) && empty($_SESSION['funcionario_id']) && empty($_SESSION['protetico_id'])) {
    header('Location: login ');
    //Mandar para Login
}else if(!empty($_SESSION['cliente_id'])){
    header('Location: servico');
}

$servicoController = new ServicoController();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Pagamento Alterar</title>
    <meta charset="utf-8">
    <link href="assets/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap"


</head>
<body>

<header>
    <ul>
        <a href="cadastro" >
            <li class="Menu"><i class="fas fa-bars"></i></li>
        </a>
        <li class="title">Pagamento</li>
        <li class="adicionar">
            <button form="formId" type="submit" style="background-color: transparent; border: 1px solid transparent">
                <i class="fas fa-check fa-3x"></i>
            </button>
        </li>
    </ul>
</header>

<main>
    <form id="formId" action="pagamentoAtualizar" method="post">
    <div class="inputs">
        <label>Ordem Serviço</label>
        <select id="listOrdemServico" name="nOS" readonly="readonly">
            <option value="<?= $_GET['id'] ?>"><?= $_GET['id'] ?></option>
        </select>

        <label for="servico">Serviço
            <select id="listServico" name="nServico" readonly="readonly">
                <option value="<?= $_GET['servico']['id'] ?>"><?= $_GET['tipoServico']['nome'] ?></option>
            </select>
        </label>
        <label for="previsaoEntrega">Previsão Entrega
            <input id="previsaoEntrega" placeholder="Previsão de Entrega" name="nDataEntrega" type="date" readonly="readonly">
        </label>
        <label>Forma de Pagamento
            <select id="listFormaPagamento" name="nFormaPagamento">
                <?php $servicoController->selectPagamento()?>
            </select>
        </label>
        <label>Pago
            <select id="listPago" name="nPago">
                <option value="1">Sim</option>
                <option value="2">Não</option>
            </select>
        </label>

    </div>
    </form>
</main>
    <footer>
        <ul>
            <a href="perfil">
                <li class="user"><i class="fas fa-user"></i></li>
            </a>
            <a href="servico">
                <li class="servico"><i class="fas fa-eye"></i></li>
            </a>
            <a href="os">
                <li class="adicionar"><i class="fas fa-plus"></i></li>
            </a>
        </ul>

    </footer>




<script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
<script src="assets/js/jquery-3.5.0.min.js"></script>
<script src="assets/js/PagamentoAlterar.js"></script>
</body>
</html>