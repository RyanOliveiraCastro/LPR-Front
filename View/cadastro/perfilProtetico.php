<?php

namespace LPR\view;

use LPR\Controller\ProteticoController;
use LPR\Controller\UfController;

require __DIR__ . '/../../vendor/autoload.php';

$proteticoController = new ProteticoController();
$ufController = new UfController();
@session_start();
if(empty($_SESSION['cliente_id']) && empty($_SESSION['funcionario_id']) && empty($_SESSION['protetico_id'])) {
    header('Location: ../login');
    //Mandar para Login
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Adicionar Protetico</title>
    <meta charset="utf-8">
    <link href="<?= URL_BASE . '/assets/css.css'?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap"
</head>
<body>

<header>
    <ul>
        <a href="cadastro">
            <li class="Menu"><i class="fas fa-arrow-left"></i></li>
        </a>
        <li class="title">Protetico</li>
        <li class="adicionar">
            <button form="formId" type="submit" style="background-color: transparent; border: 1px solid transparent">
                <i class="fas fa-check fa-3x"></i>
            </button>
        </li>
    </ul>
</header>

<main>

    <form id="formId" action="cadastro/ProteticoInserir" method="post">
        <div class="inputs">
            <label>Cliente</label>
            <select id="listCliente" name="nListCliente">
                <?php $proteticoController->selectProteticoPerfil(); ?>
            </select>
            <label>ID
                <input id="id" placeholder="ID" type="text" name="nId" readonly="readonly">
            </label>
            <label for="nome">Nome
                <input id="nome" placeholder="Nome" type="text" name="nNome" required>
            </label>

            <label for="telefone">Telefone
                <input id="telefone" placeholder="Telefone" type="tel" name="nTelefone" required>
                <input id="telefoneId" name="nTelefoneId" style="display:none">
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

            <div class="listCpfCro">
                <label for="cpf" id="labelCpf">CPF
                    <input id="cpf" placeholder="Cpf" type="number"  name="nCpf" required>
                </label>

                <label for="cro" id="labelCro">CRO
                    <input id="cro" placeholder="CRO" type="number"  name="nCro" required>
                </label>
            </div>

            <label for="senha">Senha
                <input id="senha" placeholder="Senha" type="password" name="nSenha" required>
            </label>
        </div>
    </form>

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


</main>


<script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
<link href="<?= URL_BASE .  '/assets/css.css'?>" rel="stylesheet">
<script src="<?= URL_BASE . '/assets/js/jquery-3.5.0.min.js'?>"></script>
<script src="<?= URL_BASE . '/assets/js/perfil.js' ?>"></script>
</body>
</html>