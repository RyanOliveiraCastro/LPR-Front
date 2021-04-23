<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class OSController
{
    public function redirect()
    {

        require __DIR__ . "/../../view/OS.php";
    }

    public function redirectAlterar($id)
    {
        $_GET['id'] = $id;
        require __DIR__ . '/../../view/OSAlterar.php';
    }

    public function redirectVisualizar($id)
    {
        $_GET['id'] = $id;
        require __DIR__ . '/../../view/OSVisualizar.php';
    }

    public function redirectOsAlterarError($text){
        $_GET['error'] = $text;
        require __DIR__ . '/../../view/OS.php';
    }


    public function selectOs()
    {

        $ch = curl_init('localhost:8080/ordemServico');

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

    public function carregaOS()
    {
        @session_start();
        //session_destroy();
        if ($_SESSION['cliente_id'] != null) {

            $ch = curl_init('localhost:8080/ordemServico/buscarPorCliente/' . $_SESSION['cliente_id']);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json')
            );

            $jsonDecode = json_decode(curl_exec($ch), true);


            foreach ($jsonDecode as $value) {
                $backgroudColor = '#C4C4C4';

                if ($value['atualizacaoEtapa'] == "FINALIZADA") {
                    $backgroudColor = '#fcff52';
                }

                if ($value['atualizacaoEtapa'] == "ENVIADO") {
                    $backgroudColor = '#ff963b';
                }

                if ($value['atualizacaoEtapa'] == "ENTREGUE") {
                    $backgroudColor = '#59ff72';
                }
                echo('<a href="osVisualizar/' . $value['id'] . '"><section class="container stretch">
                        <div class="item center" style="background-color: ' . $backgroudColor . '">
                            <div> ' . $value['id'] . ' </div>
                        </div>
                
                        <div class="item" style="background-color: ' . $backgroudColor . '">
                            <div class="subItem">
                                ' . $value['funcionario']['nome'] . '
                            </div>
                            <div class="subItem">
                                ' . $value['itens'][0]['servico']['tipoServico']['nome'] . '
                            </div>
                        </div>
                
                        <div class="item datasServico" style="background-color: ' . $backgroudColor . '">
                            <div class="subItem">
                               ' . date_format(date_create($value['recebido']), 'd/m/Y') . '
                            </div>
                            <div class="subItem">
                              ' . date_format(date_create($value['entrega']), 'd/m/Y') . '
                            </div>
                        </div>
                    </section></a>');
            }


        }
        else if ($_SESSION['funcionario_id'] != null){

            $ch = curl_init('localhost:8080/ordemServico/buscarPorFuncionario/' . $_SESSION['funcionario_id']);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json')
            );

            $jsonDecode = json_decode(curl_exec($ch), true);


            foreach ($jsonDecode as $value) {
                $backgroudColor = '#C4C4C4';

                if ($value['atualizacaoEtapa'] == "FINALIZADA") {
                    $backgroudColor = '#fcff52';
                }

                if ($value['atualizacaoEtapa'] == "ENVIADO") {
                    $backgroudColor = '#ff963b';
                }

                if ($value['atualizacaoEtapa'] == "ENTREGUE") {
                    $backgroudColor = '#59ff72';
                }
                echo('<a href="osAlterar/' . $value['id'] . '"><section class="container stretch">
                        <div class="item center" style="background-color: ' . $backgroudColor . '">
                            <div> ' . $value['id'] . ' </div>
                        </div>
                
                        <div class="item" style="background-color: ' . $backgroudColor . '">
                            <div class="subItem">
                                ' . $value['funcionario']['nome'] . '
                            </div>
                            <div class="subItem">
                                ' . $value['itens'][0]['servico']['tipoServico']['nome'] . '
                            </div>
                        </div>
                
                        <div class="item datasServico" style="background-color: ' . $backgroudColor . '">
                            <div class="subItem">
                               ' . date_format(date_create($value['recebido']), 'd/m/Y') . '
                            </div>
                            <div class="subItem">
                              ' . date_format(date_create($value['entrega']), 'd/m/Y') . '
                            </div>
                        </div>
                    </section></a>');
            }
        }
        else if ($_SESSION['protetico_id'] != null){

            $ch = curl_init('localhost:8080/ordemServico/buscarPorProtetico/' . $_SESSION['protetico_id']);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json')
            );

            $jsonDecode = json_decode(curl_exec($ch), true);


            foreach ($jsonDecode as $value) {
                $backgroudColor = '#C4C4C4';

                if ($value['atualizacaoEtapa'] == "FINALIZADA") {
                    $backgroudColor = '#fcff52';
                }

                if ($value['atualizacaoEtapa'] == "ENVIADO") {
                    $backgroudColor = '#ff963b';
                }

                if ($value['atualizacaoEtapa'] == "ENTREGUE") {
                    $backgroudColor = '#59ff72';
                }
                echo('<a href="osAlterar/' . $value['id'] . '"><section class="container stretch">
                        <div class="item center" style="background-color: ' . $backgroudColor . '">
                            <div> ' . $value['id'] . ' </div>
                        </div>
                
                        <div class="item" style="background-color: ' . $backgroudColor . '">
                            <div class="subItem">
                                ' . $value['funcionario']['nome'] . '
                            </div>
                            <div class="subItem">
                                ' . $value['itens'][0]['servico']['tipoServico']['nome'] . '
                            </div>
                        </div>
                
                        <div class="item datasServico" style="background-color: ' . $backgroudColor . '">
                            <div class="subItem">
                               ' . date_format(date_create($value['recebido']), 'd/m/Y') . '
                            </div>
                            <div class="subItem">
                              ' . date_format(date_create($value['entrega']), 'd/m/Y') . '
                            </div>
                        </div>
                    </section></a>');
            }
        }
    }

    public function OsInserir()
    {

        $pagamentoController = new PagamentoController();
        $osController = new OSController();
        if (empty($_POST['nId'])) {

            $json = '  {
            "paciente": " ' . $_POST['nPaciente'] . ' ",
            "recebido": " ' . date("Y-m-d") . ' ",
            "entrega": "' . $_POST['nEntrega'] . '",
            "observacao": "' . $_POST['nObservacao'] . '",
            "valor": 0,
             "itens": [
                    {
                        "servico": {
                        
                            "caixa":{
                                "id": ' . $_POST['nCaixa'] . '
                            },
                            "tipoServico": {
    				            "id": ' . $_POST['nServico'] . '
					        }
                        },			
                        "valor": 0
                    }
                    ],
            "funcionario": {
             "id": ' . $_POST['nFuncionario'] . '
            },  
            "protetico": {
             "id": ' . $_POST['nProtetico'] . '
            },           
            "cliente": {
              "id": ' . $_POST['nDentista'] . ',                 
              "tipoCliente": {
                "id": ' . $_POST['nTipoCliente'] . ',
                "tabelaPreco": {
                  "id": ' . $_POST['nTabelaPreco'] . '
                }
              }              
            },
             "atualizacaoEtapa": "' . $_POST['nStatus'] . '"
          }';

            $ch = curl_init('localhost:8080/ordemServico');

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(

                    'Content-Type: application/json',

                    'Content-Length: ' . strlen($json))

            );
            $jsonDecode = json_decode(curl_exec($ch), true);
            if(@$jsonDecode['message'] == "Este Cliente possui debito maior que 500 Reais!"){
                $osController->redirectOsAlterarError($jsonDecode['message']);
            }else {
                $pagamentoController->redirectPagamento($jsonDecode);
            }
        }
        else{
            $json = '  {
            "paciente": " ' . $_POST['nPaciente'] . ' ",
            "recebido": " ' . date("Y-m-d") . ' ",
            "entrega": "' . $_POST['nEntrega'] . '",
            "observacao": "' . $_POST['nObservacao'] . '",
            "valor": 0,
             "itens": [
                    {
                        "servico": {
                            "id": ' . $_POST['nServicoId'] . ',
                            "caixa":{
                                "id": ' . $_POST['nCaixa'] . '
                            },
                            "tipoServico": {
    				            "id": ' . $_POST['nServico'] . '
					        }
                        },			
                        "valor": 0
                    }
                    ],
            "funcionario": {
             "id": ' . $_POST['nFuncionario'] . '
            },  
            "protetico": {
             "id": ' . $_POST['nProtetico'] . '
            },             
            "cliente": {
              "id": ' . $_POST['nDentista'] . ',                 
              "tipoCliente": {
                "id": ' . $_POST['nTipoCliente'] . ',
                "tabelaPreco": {
                  "id": ' . $_POST['nTabelaPreco'] . '
                }
              }              
            },
             "atualizacaoEtapa": "' . $_POST['nStatus'] . '"
          }';

            $ch = curl_init('localhost:8080/ordemServico/' . $_POST['nId']);

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array(

                    'Content-Type: application/json',

                    'Content-Length: ' . strlen($json))

            );

            $jsonDecode = json_decode(curl_exec($ch), true);
            @session_start();
            if(!empty($_SESSION['cliente_id'])){
                $pagamentoController->redirectVisualizar($jsonDecode);
            }else{
                $pagamentoController->redirectPagamentoAlterar($jsonDecode);
            }
        }


    }
}
