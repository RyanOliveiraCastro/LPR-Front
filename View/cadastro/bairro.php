<?php

namespace LPR\view;

use LPR\Controller\UfController;

require __DIR__ . '/../../vendor/autoload.php';

$ufController = new UfController();

@session_start();
if(empty($_SESSION['cliente_id']) && empty($_SESSION['funcionario_id']) && empty($_SESSION['protetico_id'])){
    header('Location: ../login');
   //Mandar para Login
}else if(!empty($_SESSION['cliente_id'])){
    header('Location: ../servico');

}
/*else if (!empty($_SESSION['funcionario_id'])){
    $osController->redirect();
}*/
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>BAIRRO</title>
    <meta charset="utf-8">
    <link href="<?= URL_BASE . '/assets/css.css'?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap"
</head>
<body>

<header>
    <ul>
        <a href="../cadastro"><li class="Menu"><i class="fas fa-arrow-left"></i></li></a>
        <li class="title">BAIRRO</li>
        <li class="adicionar">
            <button form="formId" type="submit" style="background-color: transparent; border: 1px solid transparent">
                <i class="fas fa-check fa-3x"></i>
            </button>
        </li>
    </ul>
</header>

<main>

    <form id="formId" action="bairroInserir" method="post">
    <div class="inputs">
        <label>Siglas</label>
        <select id="listSigla" name="nListSigla">
            <?php $ufController->selectUf(); ?>
        </select>
        <label>Cidades</label>
        <select id="listCidade" name="nListCidade">
        </select>
        <label>Bairros</label>
        <select id="listBairro" name="nListBairro">
        </select>
        <label>ID</label>
        <input id="id" placeholder="Id" name="nId" type="text" readonly="readonly">
        <label>Bairro</label>
        <input id="bairro" name="nBairro" placeholder="Bairro" type="text" required>
    </div>
    </form>



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
<script src="../assets/js/bairro.js"></script>
</body>
</html>