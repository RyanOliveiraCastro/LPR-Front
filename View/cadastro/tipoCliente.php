<?php

namespace LPR\view;

use LPR\Controller\TabelaPrecoController;
use LPR\Controller\TipoClienteController;

require __DIR__ . '/../../vendor/autoload.php';

@session_start();
if(empty($_SESSION['cliente_id']) && empty($_SESSION['funcionario_id']) && empty($_SESSION['protetico_id'])) {
    header('Location: ../login');
    //Mandar para Login
}else if(!empty($_SESSION['cliente_id'])) {
    header('Location: ../servico');
}

$tabelaPrecoController = new TabelaPrecoController();
$tipoClienteController = new TipoClienteController();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>TIPO DE SERVIÇO</title>
    <meta charset="utf-8">
    <link href="../assets/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap"
</head>
<body>

<header>
    <ul>
        <a href="../cadastro"><li class="Menu"><i class="fas fa-arrow-left"></i></li></a>
        <li class="title">Tipo de Cliente</li>
        <li class="adicionar">
            <button form="formId" type="submit" style="background-color: transparent; border: 1px solid transparent">
                <i class="fas fa-check fa-3x"></i>
            </button>
        </li>
    </ul>
</header>

<main>

    <div class="inputs">
        <label>Tipo Cliente</label>
        <select id="listTipoCliente" name="nListTipoCliente">
            <option value="0">Novo Tipo Cliente</option>
            <?php $tipoClienteController->selectTipoCliente(); ?>
        </select>
        <form id="formId" action="tipoClienteInserir" method="post">
            <label>ID</label>
            <input id="id" placeholder="ID" name="nId" type="text" readonly="readonly">
            <label>Nome</label>
            <input id="nome" placeholder="Nome" name="nNomeTipoCliente" type="text" required>
            <label>Tabela Preco</label>
            <select id="listTabelaPreco" name="nTabelaPreco">
                <?php $tabelaPrecoController->selectTabelaPreco(); ?>
            </select>
        </form>
    </div>


</main>
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


<script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
<script src="../assets/js/jquery-3.5.0.min.js"></script>
<script src="../assets/js/tipoCliente.js"></script>
</body>
</html>