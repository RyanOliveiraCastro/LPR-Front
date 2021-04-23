<?php

namespace LPR\view;

use LPR\Controller\FuncionarioController;
use LPR\Controller\UfController;

require __DIR__ . '/../../vendor/autoload.php';

$funcionarioController = new FuncionarioController();
$ufController = new UfController();
@session_start();
if(empty($_SESSION['cliente_id']) && empty($_SESSION['funcionario_id'])){
    header('Location: ../login');
    //Mandar para Login
}else if(!empty($_SESSION['cliente_id'])){
    header('Location: ../servico');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Adicionar Funcionário</title>
    <meta charset="utf-8">
    <link href="../assets/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap"
</head>
<body>

<header>
    <ul>
        <a href="../cadastro">
            <li class="Menu"><i class="fas fa-arrow-left"></i></li>
        </a>
        <li class="title">Funcionário</li>
        <li class="adicionar">
            <button form="formId" type="submit" style="background-color: transparent; border: 1px solid transparent">
                <i class="fas fa-check fa-3x"></i>
            </button>
        </li>
    </ul>
</header>

<main>

    <form id="formId" action="funcionarioInserir" method="post">
        <div class="inputs">
            <label>Funcionários</label>
            <select id="listFuncionario" name="nListFuncionario">
                <option value=0>Novo Funcionário</option>
                <?php $funcionarioController->selectFuncionario(); ?>
            </select>

            <label>ID
                <input id="id" placeholder="ID" type="text" name="nId" readonly="readonly">
            </label>
            <label for="nome">Nome
                <input id="nome" placeholder="Nome" type="text" name="nNome" required>
            </label>

            <label for="telefone">Telefone
                <input id="telefone" placeholder="Telefone" type="tel" name="nTelefone" required>
                <input id="telefoneId" name="nTelefoneId" style="display:none" >
            </label>


            <label for="email">Email
                <input id="email" placeholder="Email" type="email" name="nEmail" required>
            </label>

            <label>Estado</label>
            <select id="listSigla" name="nListSigla" required>
                <?php $ufController->selectUf(); ?>
            </select>
            <label>Cidade</label>
            <select id="listCidade" name="nlistCidade" required>
            </select>
            <div class="listBairroNumero">
                <label id="labelBairro">Bairro
                    <select id="listBairro" name="nListBairro" required>
                    </select>
                </label>

                <label for="numero" id="labelNumero">Numero
                    <input id="numero" placeholder="Numero" type="number" name="nNumero" required>
                </label>
            </div>

            <label for="rua">Rua
                <input id="rua" placeholder="Rua" type="text" name="nRua" required>
            </label>

            <label for="cpf">CPF
                <input id="cpf" placeholder="Cpf" type="number" name="nCpf" required>
            </label>

            <label for="senha">Senha
                <input id="senha" placeholder="Senha" type="password" name="nSenha" required>
            </label>
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
<script src="../assets/js/funcionario.js"></script>
</body>
</html>