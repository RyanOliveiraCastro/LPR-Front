<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class TipoClienteController
{

    public function redirect()
    {

        require __DIR__ . "/../../view/cadastro/tipoCliente.php";
    }

    public function selectTipoCliente()
    {

        $ch = curl_init('localhost:8080/tipoCliente');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        foreach ($jsonDecode as $value) {
            echo('<option value=' . $value['id'] . '>' . $value['nome'] . '</option>');
        }
    }

    public function tipoClienteInserir()
    {

        if (empty($_POST['nId'])) {

            $json = '{
	                    "nome": "' . $_POST['nNomeTipoCliente'] . '",
	                    "tabelaPreco": {
	                        "id": ' . $_POST['nTabelaPreco'] . '
	                    }
                    }';

            $ch = curl_init('localhost:8080/tipoCliente');
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
	                    "nome": "' . $_POST['nNomeTipoCliente'] . '",
	                    "tabelaPreco": {
	                        "id": ' . $_POST['nTabelaPreco'] . '
	                    }
                    }';

            $ch = curl_init('localhost:8080/tipoCliente/' . $_POST['nId']);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
            );
            $jsonDecode = json_decode(curl_exec($ch), true);
        }

        header('Location: tipoCliente');
    }


}