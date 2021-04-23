<?php

namespace LPR\view;

use LPR\Controller\FuncionarioController;
use LPR\Controller\UfController;

require __DIR__ . '/../vendor/autoload.php';

$funcionarioController = new FuncionarioController();
$ufController = new UfController();
@session_start();

if(!empty($_SESSION['cliente_id'])){
    header('Location: servico');
}else if(!empty($_SESSION['funcionario_id'])){
    header('Location: servico');
}else if(!empty($_SESSION['protetico_id'])){
    header('Location: servico');
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link href="assets/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap"
</head>
<body>

<header>
    <ul>

        <li class="title">LOGIN</li>
    </ul>
</header>

<main>
    <div class="buttons">
        <a href="loginCliente" id="cliente" type="button">CLIENTE</a>
        <a href="#" class="active" id="funcionario" type="button">FUNCIONARIO</a>
        <a href="loginProtetico" id="protetico" type="button">PROTETICO</a>
    </div>
    <div class="logo">
        <img src="assets/imagens/logo.png">
    </div>
    <form action="logarFuncionario" method="post">
    <div class="inputs">
        <input id="login" name="nLogin" placeholder="Login" type="text">
        <input id="senha" name="nSenha" placeholder="Senha" type="password">

    </div>

    <div class="buttons">

        <input id="entrar" type="submit" value="ENTRAR">
    </div>
    </form>



</main>


<script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
<script src="assets/js/jquery-3.5.0.min.js"></script>
</body>
</html>