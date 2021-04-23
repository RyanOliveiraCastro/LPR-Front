<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class TabelaPrecoController
{

    public function redirect()
    {

        require __DIR__ . "/../../view/cadastro/tabelaPreco.php";
    }

    public function selectTabelaPreco()
    {

        $ch = curl_init('localhost:8080/tabelaPreco');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        foreach ($jsonDecode as $value) {
            echo('<option value=' . $value['id'] . '>' . $value['descricao'] . '</option>');
        }
    }


    public function tabelaPrecoInserir()
    {
        $listItens = "";
        for ($i = 0; $i <= $_POST['nContador']; $i++) {
            $prazo = $_POST['nPrazo_' . $i];
            $valor = $_POST['nValor_' . $i];
            $id = $_POST['nListServico_' . $i];
            if ($i == $_POST['nContador']) {
                $listItens .= '{
                        "prazo": "' . $prazo. '",
                        "valor": "' . $valor. '",
                         "tipoServico": {
                            "id": ' . $id . '
                        }		
				        }';
            } else {
                $listItens .= '{
                        "prazo": "' . $prazo. '",
                        "valor": "' . $valor. '",
                         "tipoServico": {
                            "id": ' . $id . '
                        }		
				        },';
            }
        }
        if (empty($_POST['nId'])) {

            $json = '{
	                    "descricao": "' . $_POST['nTabelaPreco'] . '",
	                    "itens": [' . $listItens . ']
                    }';

            $ch = curl_init('localhost:8080/tabelaPreco');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
            );

            $jsonDecode = json_decode(curl_exec($ch), true);

        }

        header('Location: tabelaPreco');
    }


}