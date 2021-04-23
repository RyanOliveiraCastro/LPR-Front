<?php

namespace LPR\Controller;
require __DIR__ . '/../../vendor/autoload.php';

class RelatorioController
{

    public function redirect()
    {

        require __DIR__ . "/../../view/relatorio/menuRelatorio.php";
    }

    public function clienteComDebito()
    {

        require __DIR__ . "/../../view/relatorio/clienteComDebito.php";
    }

    public function osPeriodoCliente()
    {
        require __DIR__ . "/../../view/relatorio/osPeriodoCliente.php";
    }

    public function osComDebito()
    {
        require __DIR__ . "/../../view/relatorio/osComDebito.php";
    }

    public function servicoRealizado()
    {
        require __DIR__ . "/../../view/relatorio/servicoRealizado.php";
    }

    public function transportePorCliente()
    {
        require __DIR__ . "/../../view/relatorio/transportePorCliente.php";
    }

    public function comissaoFuncionario()
    {
        require __DIR__ . "/../../view/relatorio/comissaoFuncionario.php";
    }

    public function servicoPorCliente()
    {
        require __DIR__ . "/../../view/relatorio/servicoPorCliente.php";
    }

    public function metodoPagamento()
    {
        require __DIR__ . "/../../view/relatorio/metodoPagamento.php";
    }




    public function listClientesComDebito(){

        $ch = curl_init('localhost:8080/relatorio/clienteComDebito');
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
                            <th style='border-bottom:2px solid black' scope='col'>CLIENTE</th>                            
                            <th style='border-bottom:2px solid black' scope='col'>VALOR</th>
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>$value[0]</td>
                    <td style='border-top:1px solid black'>$value[1]</td>
                    <td style='border-top:1px solid black'>$value[2]</td>
                  </tr>");
        }
    echo("</tbody> </table>");
    }

    public function listOsComDebito(){

        $ch = curl_init('localhost:8080/relatorio/OsComDebito');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);

        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>OS ID</th>
                            <th style='border-bottom:2px solid black' scope='col'>CLIENTE</th>                            
                            <th style='border-bottom:2px solid black' scope='col'>DATA</th>
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            $date=date_create($value[2]);
            $date=date_format($date,"d/m/Y");
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>$value[0]</td>
                    <td style='border-top:1px solid black'>$value[1]</td>
                    <td style='border-top:1px solid black'>$date</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listServicoRealizado(){

        $ch = curl_init('localhost:8080/relatorio/servicoRealizado');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>QUANTIDADE</th>
                            <th style='border-bottom:2px solid black' scope='col'>SERVIÇO</th>  
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>$value[0]</td>
                    <td style='border-top:1px solid black'>$value[1]</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listComissaoFuncionario(){

        $ch = curl_init('localhost:8080/relatorio/comissaoPorFuncionario');
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
                            <th style='border-bottom:2px solid black' scope='col'>FUNCIONARIO</th>
                            <th style='border-bottom:2px solid black' scope='col'>QUANTIDADE</th>                              
                            <th style='border-bottom:2px solid black' scope='col'>VALOR</th>  
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {
            echo("<tr scope='row'>
                    <td style='border-top:1px solid black'>$value[0]</td>
                    <td style='border-top:1px solid black'>$value[1]</td>
                    <td style='border-top:1px solid black'>$value[2]</td>
                    <td style='border-top:1px solid black'>$value[3]</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }

    public function listMetodoPagamento(){

        $ch = curl_init('localhost:8080/relatorio/metodoPagamento');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $jsonDecode = json_decode(curl_exec($ch), true);
        echo("<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>
                   <thead>
                        <tr>
                            <th style='border-bottom:2px solid black' scope='col'>QUANTIDADE</th>
                            <th style='border-bottom:2px solid black' scope='col'>FORMA PAGAMENTO</th>   
                        </tr>
                    </thead>
                    <tbody>
                    ");
        foreach ($jsonDecode as $value) {

            if($value[0] == 0){
                $forma ="DINHEIRO";
            }else if($value[0] == 1){
                $forma = "BOLETO";
            }else if($value[0] == 2){
                $forma = "CHEQUE";
            }

            echo("<tr scope='row'>                 
                    <td style='border-top:1px solid black'>$value[1]</td>
                    <td style='border-top:1px solid black'>$forma</td>
                  </tr>");
        }
        echo("</tbody> </table>");
    }


}