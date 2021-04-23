<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class ProteticoController
{

    public function redirect()
    {

        require __DIR__ . "/../../view/cadastro/protetico.php";
    }

    public function selectProtetico(){

        $ch = curl_init('localhost:8080/protetico');

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

    public function selectProteticoPerfil(){

        $ch = curl_init('localhost:8080/protetico/' . $_SESSION['protetico_id']);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        echo('<option value=' . $jsonDecode['id'] . '>' . $jsonDecode['nome'] . '</option>');

    }


    public function proteticoInserir()
    {
        $telefoneId = empty($_POST['nTelefoneId']) ? 'null' : $_POST['nTelefoneId'];
        if (empty($_POST['nId'])) {

            $json = ' {
                        "nome": "'. $_POST['nNome']. '",
                        "cpf": "'. $_POST['nCpf']. '",
                        "rua": "'. $_POST['nRua']. '",
                        "numero": '. $_POST['nNumero']. ',
                        "cro": '. $_POST['nCro']. ',
                        "bairro": {
                          "id": '. $_POST['nListBairro']. '    
                        },
                        "telefone": {
                          "id": '. $telefoneId . ',
                          "numero": "'.$_POST['nTelefone'] . '"
                        },
                        "email": "'. $_POST['nEmail']. '",
                        "senha": "'. $_POST['nSenha']. '"
                      }';

            $ch = curl_init('localhost:8080/protetico');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
            );

            $jsonDecode = json_decode(curl_exec($ch), true);


        } else if (!empty($_POST['nId'])) {

            $json = ' {
                        "nome": "'. $_POST['nNome']. '",
                        "cpf": "'. $_POST['nCpf']. '",
                        "rua": "'. $_POST['nRua']. '",
                        "numero": '. $_POST['nNumero']. ',
                        "cro": '. $_POST['nCro']. ',
                        "bairro": {
                          "id": '. $_POST['nListBairro'] . '    
                        },
                        "telefone": {
                          "id": '. $telefoneId . ',
                          "numero": "'.$_POST['nTelefone'] . '"
                        },
                        "email": "'. $_POST['nEmail']. '",
                        "senha": "'. $_POST['nSenha']. '"
                      }';

            $ch = curl_init('localhost:8080/protetico/' . $_POST['nId']);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
            );
            $jsonDecode = json_decode(curl_exec($ch), true);
        }
        header('Location: protetico');
    }


}