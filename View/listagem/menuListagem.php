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
    <title>RELATORIOS</title>
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
        <li class="title">LISTAGEM</li>
    </ul>
</header>

<main>
    <div class="listItemCadastro">
        <?php if (empty($_SESSION['cliente_id'])) { ?>
            <a href="listagem/uf">
                <div class="itemCadastro">UF</div>
            </a>
            <a href="listagem/cidade">
                <div class="itemCadastro">CIDADE</div>
            </a>
            <a href="listagem/bairro">
                <div class="itemCadastro">BAIRRO</div>
            </a>
            <a href="listagem/protetico">
                <div class="itemCadastro">PROTETICO</div>
            </a>
            <a href="listagem/funcionario">
                <div class="itemCadastro">FUNCIONARIO</div>
            </a>
            <a href="listagem/cliente">
                <div class="itemCadastro">CLIENTE</div>
            </a>
            <a href="listagem/tipoServico">
                <div class="itemCadastro">TIPO DE SERVICO</div>
            </a>
            <a href="listagem/etapa">
                <div class="itemCadastro">ETAPA</div>
            </a>
            <a href="listagem/pagamento">
                <div class="itemCadastro">PAGAMENTO</div>
            </a>
            <a href="listagem/ordemServico">
                <div class="itemCadastro">ORDEM DE SERVICO</div>
            </a>
            <a href="listagem/tabelaPreco">
                <div class="itemCadastro">TABELA DE PREÇO</div>
            </a>
            <a href="listagem/transporte">
                <div class="itemCadastro">TRANSPORTE</div>
            </a>
            <a href="listagem/caixa">
                <div class="itemCadastro">CAIXA</div>
            </a>

        <?php } ?>
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