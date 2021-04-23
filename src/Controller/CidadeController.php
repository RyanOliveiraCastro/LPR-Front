<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class CidadeController
{

    public function redirect()
    {

        require __DIR__ . "/../../view/cadastro/cidade.php";
    }

    public function selectCidade($id){

        $ch = curl_init('localhost:8080/cidade/uf/' . $id);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        foreach ($jsonDecode as $value) {
            echo('<option value=' . $value['id'] . '>' . $value['nome'] . '</option>');
        }
    }

    public function cidadeInserir()
    {
        if (empty($_POST['nId'])) {

            $json = '{
	                    "nome": "' . $_POST['nCidade'] . '",
	                    "uf": {
                            "id": ' . $_POST['nListSigla'] . '
                        }
                    }';

            $ch = curl_init('localhost:8080/cidade');
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
	                    "nome": "' . $_POST['nCidade'] . '",
	                    "uf": {
                            "id": ' . $_POST['nListSigla'] . '
                        }
                    }';

            $ch = curl_init('localhost:8080/cidade/' . $_POST['nId']);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
            );
            $jsonDecode = json_decode(curl_exec($ch), true);
        }



        header('Location: cidade');
    }

}