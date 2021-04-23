<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class TransporteController
{

    public function redirect()
    {

        require __DIR__ . "/../../view/transporte.php";
    }
    public function redirectTransporte()
    {
        $json = $_SESSION['jsonCompleto'];

        $_GET['id'] = $json['id'];
        $_GET['tipoServico'] = $json['itens'][0]['servico']['tipoServico'];
        $_GET['servico'] = $json['itens'][0]['servico'];
        require __DIR__ . "/../../view/transporte.php";
    }

    public function redirectTransporteAlterar()
    {
        $json = $_SESSION['jsonCompleto'];

        $_GET['id'] = $json['id'];
        $_GET['tipoServico'] = $json['itens'][0]['servico']['tipoServico'];
        $_GET['servico'] = $json['itens'][0]['servico'];
        require __DIR__ . "/../../view/transporteAlterar.php";
    }
    public function redirectVisualizar()
    {
        $json = $_SESSION['jsonCompleto'];

        $_GET['id'] = $json['id'];
        $_GET['tipoServico'] = $json['itens'][0]['servico']['tipoServico'];
        $_GET['servico'] = $json['itens'][0]['servico'];
        require __DIR__ . "/../../view/transporteVisualizar.php";
    }


    public function selectTransporte(){

        $ch = curl_init('localhost:8080/servico/transporte');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        foreach ($jsonDecode as $value) {
            echo('<option value=' . $value . '>' . $value . '</option>');
        }
    }

    public function transporteInserir()
    {
        @session_start();
        $_SESSION['jsonCompleto'];

        $servicoController = new ServicoController();
        $json = '{
                "dataEntrega": "' . $_POST['nDataEntrega']  . '",
                "formaTransporte": "' . $_POST['nFormaTransporte']  . '",
                "valor": ' . $_POST['nValor'] . ',
                "servicoId": ' . $_POST['nServico']  . ',                
                "ordemServicoId": ' . $_POST['nOS']  . '
              }';



        $ch = curl_init('localhost:8080/transporte');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

                'Content-Type: application/json',

                'Content-Length: ' . strlen($json))

        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        $servicoController->redirect();

    }


    public function transporteAtualizar()
    {
        @session_start();
        $_SESSION['jsonCompleto'];

        $servicoController = new ServicoController();
        $json = '{
                "dataEntrega": "' . $_POST['nDataEntrega']  . '",
                "formaTransporte": "' . $_POST['nFormaTransporte']  . '",
                "valor": ' . $_POST['nValor'] . ',
                "servicoId": ' . $_POST['nServico']  . ',                
                "ordemServicoId": ' . $_POST['nOS']  . '
              }';



        $ch = curl_init('localhost:8080/transporte');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

                'Content-Type: application/json',

                'Content-Length: ' . strlen($json))

        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        $servicoController->redirect();

    }

}