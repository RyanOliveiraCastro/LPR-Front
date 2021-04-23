<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class UfController
{

    public function redirect()
    {
        require __DIR__ . "/../../view/cadastro/uf.php";
    }

    public function selectUf(){

        $ch = curl_init('localhost:8080/uf');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        foreach ($jsonDecode as $value) {
            echo('<option value=' . $value['id'] . '>' . $value['sigla'] . '</option>');
        }
    }

    public function ufInserir()
    {
        if (empty($_POST['nId'])) {

            $json = '{
	                    "nome": "' . $_POST['nEstado'] . '",
	                    "sigla": "' . $_POST['nSigla'] . '"
                    }';

            $ch = curl_init('localhost:8080/uf');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
            );

            $jsonDecode = json_decode(curl_exec($ch), true);


        } else if (!empty($_POST['nId'])) {

            $json = '{
	                    "nome": "' . $_POST['nEstado'] . '",
	                    "sigla": "' . $_POST['nSigla'] . '"
                    }';

            $ch = curl_init('localhost:8080/uf/' . $_POST['nId']);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
            );
            $jsonDecode = json_decode(curl_exec($ch), true);
        }

        $tipoServicoController = new TipoServicoController();
        header('Location: uf');
    }

}