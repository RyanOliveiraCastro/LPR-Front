<?php

namespace LPR\Controller;

use LPR\Model\domain\Cliente;
use LPR\Model\domain\Funcionario;
use LPR\Model\domain\Protetico;

require __DIR__ . '/../../vendor/autoload.php';

class LoginController
{

    public function redirectCliente()
    {

        require __DIR__ . "/../../view/loginCliente.php";
    }

    public function redirectFuncionario()
    {

        require __DIR__ . "/../../view/loginFuncionario.php";
    }

    public function redirectProtetico()
    {

        require __DIR__ . "/../../view/loginProtetico.php";
    }

    public function sair()
    {
        @session_start();
        session_destroy();
        require __DIR__ . "/../../view/loginFuncionario.php";
    }


    public function logarProtetico()
    {
        $protetico = new Protetico(null, null, null, null, null, null, null, $_POST['nLogin'], $_POST['nSenha']);

        $json = json_encode($protetico);

        $ch = curl_init('localhost:8080/login/logarProtetico');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

                'Content-Type: application/json',

                'Content-Length: ' . strlen($json))

        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        if($jsonDecode['id'] == null){
            header('Location: loginProtetico');
            exit();
        }
        @session_start();
        $_SESSION["funcionario_id"] = null;
        $_SESSION["cliente_id"] = null;
        $_SESSION["protetico_id"] = $jsonDecode['id'];
        $_SESSION["nome"] = $jsonDecode['nome'];
        $_SESSION["cpf"] = $jsonDecode ['cpf'];
        $_SESSION["email"] = $jsonDecode['email'];

        header('Location: servico');

    }

    public function logarCliente()
    {
        $cliente = new Cliente(null, null, null, null, null, null, null, $_POST['nLogin'], $_POST['nSenha']);

        $json = json_encode($cliente);

        $ch = curl_init('localhost:8080/login/logarCliente');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

                'Content-Type: application/json',

                'Content-Length: ' . strlen($json))

        );

        $jsonDecode = json_decode(curl_exec($ch), true);

        if($jsonDecode['id'] == null){
            header('Location: loginCliente');
            exit();
        }

        @session_start();
        $_SESSION["funcionario_id"] = null;
        $_SESSION["protetico_id"] = null;
        $_SESSION["cliente_id"] = $jsonDecode['id'];
        $_SESSION["nome"] = $jsonDecode['nome'];
        $_SESSION["cpf"] = $jsonDecode ['cpf'];
        $_SESSION["email"] = $jsonDecode['email'];

        header('Location: servico');

    }

    public function logarFuncionario()
    {
        $funcionario = new Funcionario(null, null, null, null, null, null, null, $_POST['nLogin'], $_POST['nSenha']);


        $json = json_encode($funcionario);

        $ch = curl_init('localhost:8080/login/logarFuncionario');

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

                'Content-Type: application/json',

                'Content-Length: ' . strlen($json))

        );

        $jsonDecode = json_decode(curl_exec($ch), true);


        if($jsonDecode['id'] == null){
            header('Location: loginFuncionario');
            exit();
        }

        @session_start();
        $_SESSION["cliente_id"] = null;
        $_SESSION["protetico_id"] = null;
        $_SESSION["funcionario_id"] = $jsonDecode['id'];
        $_SESSION["nome"] = $jsonDecode['nome'];
        $_SESSION["cpf"] = $jsonDecode ['cpf'];
        $_SESSION["email"] = $jsonDecode['email'];

        header('Location: servico');

    }

}