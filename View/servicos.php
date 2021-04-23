<?php

namespace LPR\view;

use LPR\Model\domain\Cliente;
use LPR\Controller\OSController;

require __DIR__ . '/../vendor/autoload.php';

@session_start();

if(empty($_SESSION['cliente_id']) && empty($_SESSION['funcionario_id']) && empty($_SESSION['protetico_id'])) {
    header('Location: login ');
    //Mandar para Login
}

$osController = new OSController();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>SERVIÇOS</title>
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
        <li class="title">SERVIÇOS</li>
    </ul>
</header>

<main>
    <?php
    $osController->carregaOS();
    ?>
</main>
<footer>
    <ul>
        <a href="perfil">
            <li class="user"><i class="fas fa-user"></i></li>
        </a>
        <a href="servico">
            <li class="servicos"><i class="fas fa-eye"></i></li>
        </a>
        <li class="adicionar"><a href="os"><i class="fas fa-plus"></i></a></li>
    </ul>

</footer>


<script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
<script src="assets/js/jquery-3.5.0.min.js"></script>
</body>
</html>