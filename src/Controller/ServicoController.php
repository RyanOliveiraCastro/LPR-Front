<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class ServicoController
{

    public function redirect()
    {
        require __DIR__ . "/../../view/servicos.php";
    }

    public function selectStatus()
    {
        $ch = curl_init('localhost:8080/servico/status');
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

    public function selectPagamento()
    {
        $ch = curl_init('localhost:8080/servico/pagamento');
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

    public function selectTransporte()
    {
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



}