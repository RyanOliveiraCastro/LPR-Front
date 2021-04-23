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
        <li class="title">RELATORIOS</li>
    </ul>
</header>

<main>
    <div class="listItemCadastro">
        <?php if (empty($_SESSION['cliente_id'])) { ?>
            <a href="relatorio/clienteComDebito">
                <div class="itemCadastro">CLIENTE COM DEBITO</div>
            </a>
            <a href="relatorio/osPeriodoCliente">
                <div class="itemCadastro">OS POR PERIODO E CLIENTE</div>
            </a>
            <a href="relatorio/osComDebito">
                <div class="itemCadastro">OS EM ABERTO</div>
            </a>
            <a href="relatorio/servicoRealizado">
                <div class="itemCadastro">SERVIÇOS REALIZADOS</div>
            </a>
            <a href="relatorio/transportePorCliente">
                <div class="itemCadastro">TRANSPORTE POR CLIENTE</div>
            </a>
            <a href="relatorio/comissaoFuncionario">
                <div class="itemCadastro">COMISSAO POR FUNCIONARIO</div>
            </a>
            <a href="relatorio/servicoPorCliente">
                <div class="itemCadastro">SERVIÇO POR CLIENTE</div>
            </a>
            <a href="relatorio/metodoPagamento">
                <div class="itemCadastro">METODO PAGAMENTO</div>
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