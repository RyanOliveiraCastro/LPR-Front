<?php

namespace LPR\view;
use LPR\Controller\RelatorioController;
require __DIR__ . '/../../vendor/autoload.php';

@session_start();
if(empty($_SESSION['cliente_id']) && empty($_SESSION['funcionario_id']) && empty($_SESSION['protetico_id'])) {
    header('Location: ../login');
    //Mandar para Login
}

$relatorioController = new RelatorioController();



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>RELATORIOS</title>
    <meta charset="utf-8">
    <link href="<?=URL_BASE . '/assets/css.css'?>" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap"
</head>
<body>

<header>
    <ul>
        <a href="../relatorio"><li class="Menu"><i class="fas fa-arrow-left"></i></li></a>
        <li class="title">METODO PAGAMENTO</li>
    </ul>
</header>

<main>
    <?php
    $relatorioController->listMetodoPagamento();
    ?>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="<?=URL_BASE . '/assets/js/jquery-3.5.0.min.js'?>" rel="stylesheet">
</body>
</html>