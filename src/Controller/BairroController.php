<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class BairroController
{

    public function redirect()
    {

        require __DIR__ . "/../../view/cadastro/bairro.php";
    }

    public function bairroInserir()
    {
        if (empty($_POST['nId'])) {

            $json = '{
	                    "nome": "' . $_POST['nBairro'] . '",
	                    "cidade": {
                            "id": ' . $_POST['nListCidade'] . '
                        }
                    }';

            $ch = curl_init('localhost:8080/bairro');
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
	                    "nome": "' . $_POST['nBairro'] . '",
	                    "cidade": {
                            "id": ' . $_POST['nListCidade'] . '
                        }
                    }';

            $ch = curl_init('localhost:8080/bairro/' . $_POST['nId']);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
            );
            $jsonDecode = json_decode(curl_exec($ch), true);
        }
        header('Location: bairro');
    }

}