<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class PagamentoController
{

    public static $jsonCompleto = '';

    public function redirect()
    {
        require __DIR__ . "/../../view/pagamento.php";
    }

    public function redirectPagamento($json)
    {
        @session_start();
        $_SESSION['jsonCompleto'] = $json;
        $_GET['id'] = $json['id'];
        $_GET['tipoServico'] = $json['itens'][0]['servico']['tipoServico'];
        $_GET['servico'] = $json['itens'][0]['servico'];
        require __DIR__ . "/../../view/pagamento.php";
    }

    public function redirectPagamentoAlterar($json)
    {
        @session_start();
        $_SESSION['jsonCompleto'] = $json;
        $_GET['id'] = $json['id'];
        $_GET['tipoServico'] = $json['itens'][0]['servico']['tipoServico'];
        $_GET['servico'] = $json['itens'][0]['servico'];
        require __DIR__ . "/../../view/pagamentoAlterar.php";
    }

    public function redirectVisualizar($json)
    {
        @session_start();
        $_SESSION['jsonCompleto'] = $json;
        $_GET['id'] = $json['id'];
        $_GET['tipoServico'] = $json['itens'][0]['servico']['tipoServico'];
        $_GET['servico'] = $json['itens'][0]['servico'];
        require __DIR__ . "/../../view/pagamentoVisualizar.php";
    }



    public function pagamentoInserir()
    {
        @session_start();
        $_SESSION['jsonCompleto'];

        $transporteController = new TransporteController();

        $pago = $_POST['nPago'] == 1 ? "true" : "false";


        $json = '{
                "dataPagamento": " ' . $_POST['nDataEntrega']  . ' ",
                "formaPagamento": "' . $_POST['nFormaPagamento']  . '",
                "pago": ' . $pago . ',
                "servicoId": ' . $_POST['nServico']  . ',
                "ordemServicoId": ' . $_POST['nOS']  . '
              }';

        $ch = curl_init('localhost:8080/pagamento');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

                'Content-Type: application/json',

                'Content-Length: ' . strlen($json))

        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        $transporteController->redirectTransporte();
    }

    public function pagamentoAtualizar()
    {
        @session_start();
        $_SESSION['jsonCompleto'];

        $transporteController = new TransporteController();

        $pago = $_POST['nPago'] == 1 ? "true" : "false";

        $json = '{
                "dataPagamento": " ' . $_POST['nDataEntrega']  . ' ",
                "formaPagamento": "' . $_POST['nFormaPagamento']  . '",
                "pago": ' . $pago . ',
                "servicoId": ' . $_POST['nServico']  . ',
                "ordemServicoId": ' . $_POST['nOS']  . '
              }';

        $ch = curl_init('localhost:8080/pagamento/' . $_POST['nOS'] . '/' . $_POST['nServico']);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

                'Content-Type: application/json',

                'Content-Length: ' . strlen($json))

        );

        $jsonDecode = json_decode(curl_exec($ch), true);
        if(!empty($_SESSION['cliente_id'])){
            $transporteController->redirectVisualizar();
        }else{
            $transporteController->redirectTransporteAlterar();
        }

    }


}