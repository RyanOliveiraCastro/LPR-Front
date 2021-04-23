<?php

namespace LPR\view;

use LPR\Controller\TipoServicoController;

require __DIR__ . '/../../vendor/autoload.php';

$tipoServicoController = new TipoServicoController();
@session_start();
if(empty($_SESSION['cliente_id']) && empty($_SESSION['funcionario_id']) && empty($_SESSION['protetico_id'])) {
    header('Location: ../login');
    //Mandar para Login
}else if(!empty($_SESSION['cliente_id'])) {
    header('Location: ../servico');
}
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
        <li class="title">Tipo de Serviço</li>
        <li class="adicionar">
            <button form="formId" type="submit" style="background-color: transparent; border: 1px solid transparent">
                <i class="fas fa-check fa-3x"></i>
            </button>
        </li>
    </ul>
</header>

<main>

    <div class="inputs">
        <label>Serviços</label>
        <select id="listServico" name="nListServico">
            <option value="0">Novo Servico</option>
            <?php $tipoServicoController->selectTipoServico(); ?>
        </select>
        <form id="formId" action="tipoServicoInserir" method="post">
            <label>ID</label>
            <input id="id" placeholder="ID" name="nId" type="text" readonly="readonly">
            <label>Serviço</label>
            <input id="servico" placeholder="Servico" name="nNomeServico" type="text" required>
            <label>Material</label>
            <input id="material" placeholder="Material" name="nMaterialServico" type="text" required>
            <label>Valor Comissão</label>
            <input id="comissao" placeholder="Valor Comissão" name="nValorComissao" type="number" step="0.10" min=0 required>
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
<script src="../assets/js/tipoServico.js"></script>
</body>
</html>