<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class ListagemController
{

    public function redirect()
    {

        require __DIR__ . "/../../view/listagem/menuListagem.php";
    }

    public function uf()
    {
        require __DIR__ . "/../../view/listagem/uf.php";
    }

    public function cidade()
    {
        require __DIR__ . "/../../view/listagem/cidade.php";
    }

    public function bairro()
    {
        require __DIR__ . "/../../view/listagem/bairro.php";
    }

    public function protetico()
    {
        require __DIR__ . "/../../view/listagem/protetico.php";
    }

    public function funcionario()
    {
        require __DIR__ . "/../../view/listagem/funcionario.php";
    }

    public function cliente()
    {
        require __DIR__ . "/../../view/listagem/cliente.php";
    }

    public function tipoServico()
    {
        require __DIR__ . "/../../view/listagem/TipoServico.php";
    }

    public function etapa()
    {
        require __DIR__ . "/../../view/listagem/etapa.php";
    }

    public function pagamento()
    {
        require __DIR__ . "/../../view/listagem/pagamento.php";
    }

    public function ordemServico()
    {
        require __DIR__ . "/../../view/listagem/ordemServico.php";
    }

    public function tabelaPreco()
    {
        require __DIR__ . "/../../view/listagem/tabelaPreco.php";
    }

    public function transporte()
    {
        require __DIR__ . "/../../view/listagem/transporte.php";
    }

    public function caixa()
    {
        require __DIR__ . "/../../view/listagem/caixa.php";
    }



    public function listUf()
    {
        $ch = curl_init('localhost:8080/uf');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>ID</th>
                            <th style='border-bottom:2px solid black' scope='col'>SIGLA</th>                            
                            <th style='border-bottom:2px solid black' scope='col'>NOME</th>
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['id'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['sigla'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['nome'] . "</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listCidade()
    {
        $ch = curl_init('localhost:8080/cidade');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>ID</th>
                            <th style='border-bottom:2px solid black' scope='col'>NOME</th>                            
                            <th style='border-bottom:2px solid black' scope='col'>UF</th>
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['id'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['nome'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['uf']['nome'] . "</td>
                  </tr>");
        }
        echo("</tbody> </table>");

    }

    public function listBairro()
    {
        $ch = curl_init('localhost:8080/bairro');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>ID</th>
                            <th style='border-bottom:2px solid black' scope='col'>NOME</th>                            
                            <th style='border-bottom:2px solid black' scope='col'>CIDADE</th>
                            <th style='border-bottom:2px solid black' scope='col'>UF</th>
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['id'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['nome'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['cidade']['nome'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['cidade']['uf']['nome'] . "</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listProtetico()
    {
        $ch = curl_init('localhost:8080/protetico');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>ID</th>
                            <th style='border-bottom:2px solid black' scope='col'>NOME</th>                            
                            <th style='border-bottom:2px solid black' scope='col'>CPF</th>                                                       
                            <th style='border-bottom:2px solid black' scope='col'>TELEFONE</th>                                                       
                            <th style='border-bottom:2px solid black' scope='col'>CRO</th>                           
                            <th style='border-bottom:2px solid black' scope='col'>EMAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['id'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['nome'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['cpf'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['telefone']['numero'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['cro'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['email'] . "</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listFuncionario()
    {
        $ch = curl_init('localhost:8080/funcionario');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>ID</th>
                            <th style='border-bottom:2px solid black' scope='col'>NOME</th>                            
                            <th style='border-bottom:2px solid black' scope='col'>CPF</th>                                                       
                            <th style='border-bottom:2px solid black' scope='col'>TELEFONE</th>                     
                            <th style='border-bottom:2px solid black' scope='col'>EMAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['id'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['nome'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['cpf'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['telefone']['numero'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['email'] . "</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listCliente()
    {
        $ch = curl_init('localhost:8080/cliente');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>ID</th>
                            <th style='border-bottom:2px solid black' scope='col'>NOME</th>                            
                            <th style='border-bottom:2px solid black' scope='col'>CPF</th>                                                       
                            <th style='border-bottom:2px solid black' scope='col'>TELEFONE</th>                                                       
                            <th style='border-bottom:2px solid black' scope='col'>CRO</th>                           
                            <th style='border-bottom:2px solid black' scope='col'>EMAIL</th>                        
                            <th style='border-bottom:2px solid black' scope='col'>TIPO CLIENTE</th>
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['id'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['nome'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['cpf'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['telefone']['numero'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['cro'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['email'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['tipoCliente']['nome'] . "</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listTipoServico()
    {
        $ch = curl_init('localhost:8080/tipoServico');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>ID</th>
                            <th style='border-bottom:2px solid black' scope='col'>NOME</th>                            
                            <th style='border-bottom:2px solid black' scope='col'>MATERIAL</th>                                                       
                            <th style='border-bottom:2px solid black' scope='col'>COMISSAO</th>   
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['id'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['nome'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['material'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['comissao'] . "</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listEtapa()
    {
        $ch = curl_init('localhost:8080/servico/status');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>NOME</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value . "</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listPagamento()
    {
        $ch = curl_init('localhost:8080/pagamento');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>                        
                            <th style='border-bottom:2px solid black' scope='col'>OS</th>
                            <th style='border-bottom:2px solid black' scope='col'>PAGAMENTO</th>
                            <th style='border-bottom:2px solid black' scope='col'>FORMA PAGAMENTO</th>
                            <th style='border-bottom:2px solid black' scope='col'>PAGO</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['ordemServicoId'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['dataPagamento'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['formaPagamento'] . "</td>
                    <td style='border-top:1px solid black'>" . ($value['pago'] ? 'SIM' : 'NAO') . "</td>
                  
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listTransporte()
    {
        $ch = curl_init('localhost:8080/transporte');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>OS</th>
                            <th style='border-bottom:2px solid black' scope='col'>ENTREGA</th>
                            <th style='border-bottom:2px solid black' scope='col'>TRANSPORTE</th>
                            <th style='border-bottom:2px solid black' scope='col'>VALOR</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['dataEntrega'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['formaTransporte'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['valor'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['ordemServicoId'] . "</td>
                    
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listOrdemServico()
    {
        $ch = curl_init('localhost:8080/ordemServico');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>ID</th>
                            <th style='border-bottom:2px solid black' scope='col'>RECEBIDO</th>
                            <th style='border-bottom:2px solid black' scope='col'>SAIDA</th>
                            <th style='border-bottom:2px solid black' scope='col'>VALOR</th>
                           
                            <th style='border-bottom:2px solid black' scope='col'>CLIENTE</th>
                            <th style='border-bottom:2px solid black' scope='col'>ETAPA</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['id'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['recebido'] . "</td>                    
                    <td style='border-top:1px solid black'>" . $value['entrega'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['valor'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['cliente']['nome'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['atualizacaoEtapa'] . "</td>
                    
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listTabelaPreco()
    {
        $ch = curl_init('localhost:8080/tabelaPreco');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>ID</th>
                            <th style='border-bottom:2px solid black' scope='col'>DESCRIÇÃO</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['id'] . "</td>
                    <td style='border-top:1px solid black'>" . $value['descricao'] . "</td>
                    
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listCaixa()
    {
        $ch = curl_init('localhost:8080/caixa');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>ID</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>" . $value['id'] . "</td>
                    
                  </tr>");
        }
        echo("</tbody> </table>");
    }


}