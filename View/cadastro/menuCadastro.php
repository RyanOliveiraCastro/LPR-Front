<?php

namespace LPR\view;

require __DIR__ . '/../../vendor/autoload.php';

@session_start();
if(empty($_SESSION['cliente_id']) && empty($_SESSION['funcionario_id']) && empty($_SESSION['protetico_id'])) {
    header('Location: ../login');
    //Mandar para Login
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>MENU</title>
    <meta charset="utf-8">
    <link href="assets/css.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100&display=swap"
</head>
<body>

<header>
    <ul>
        <a href="cadastro">
            <li class="Menu"><i class="fas fa-bars"></i></li>
        </a>
        <li class="title">MENU</li>
    </ul>
</header>

<main>
    <div class="listItemCadastro">
        <?php if (empty($_SESSION['cliente_id'])) { ?>
            <a href="cadastro/tipoServico">
                <div class="itemCadastro">Tipo Serviço</div>
            </a>
            <a href="cadastro/tipoCliente">
                <div class="itemCadastro">Tipo Cliente</div>
            </a>
            <!--<a href="cadastro/etapa">
                <div class="itemCadastro">Etapa</div>-->
            </a>
            <a href="cadastro/tabelaPreco">
                <div class="itemCadastro">Tabela de Preço</div>
            </a>
            <a href="cadastro/funcionario">
                <div class="itemCadastro">Funcionário</div>
            </a>
            <a href="cadastro/cliente">
                <div class="itemCadastro">Cliente</div>
            </a>
            <a href="cadastro/protetico">
                <div class="itemCadastro">Protetico</div>
            </a>
            <a href="cadastro/uf">
                <div class="itemCadastro">UF</div>
            </a>
            <a href="cadastro/cidade">
                <div class="itemCadastro">Cidade</div>
            </a>
            <a href="cadastro/bairro">
                <div class="itemCadastro">Bairro</div>
            </a>
            <a href="relatorio">
                <div class="itemCadastro">Relatorio</div>
            </a>
            <a href="listagem">
                <div class="itemCadastro">Listagem</div>
            </a>
        <?php } ?>
        <a href="sair">
            <div class="itemCadastro">Sair</div>
        </a>
    </div>

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
</body>
</html>