<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class CaixaController
{

    public function redirect()
    {

        require __DIR__ . "/../../view/cadastro/cliente.php";
    }


    public function selectCaixa(){

        $ch = curl_init('localhost:8080/caixa');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        foreach ($jsonDecode as $value) {
            echo('<option value=' . $value['id'] . '>' . $value['id'] . '</option>');
        }
    }

    public function selectCaixaNotUsed(){

        $ch = curl_init('localhost:8080/caixa/notUsed');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        foreach ($jsonDecode as $value) {
            echo('<option value=' . $value['id'] . '>' . $value['id'] . '</option>');
        }
    }

}