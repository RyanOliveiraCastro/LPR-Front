<?php

namespace LPR\view;

use LPR\Controller\UfController;

require __DIR__ . '/../../vendor/autoload.php';

$ufController = new UfController();
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
    <title>UF</title>
    <meta charset="utf-8">
    <link href="../assets/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap"
</head>
<body>

<header>
    <ul>
        <a href="../cadastro"><li class="Menu"><i class="fas fa-arrow-left"></i></li></a>
        <li class="title">UF</li>
        <li class="adicionar">
            <button form="formId" type="submit" style="background-color: transparent; border: 1px solid transparent">
                <i class="fas fa-check fa-3x"></i>
            </button>
        </li>
    </ul>
</header>

<main>
    <div class="inputs">
        <label>Siglas</label>
        <select id="listSigla" name="nListSigla">
            <option value="0">Novo Estado</option>
            <?php $ufController->selectUf(); ?>
        </select>

        <form id="formId" action="ufInserir" method="post">
        <label>ID</label>
        <input id="id" placeholder="ID" type="text" name="nId" readonly="readonly">
        <label>Sigla</label>
        <input id="sigla" placeholder="Estado" type="text" name="nSigla">
        <label>Estado</label>
        <input id="estado" placeholder="Estado" type="text" name="nEstado" required>
        </form>

    </div>



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
<script src="../assets/js/jquery-3.5.0.min.js"></script>
<script src="../assets/js/uf.js"></script>
</body>
</html>