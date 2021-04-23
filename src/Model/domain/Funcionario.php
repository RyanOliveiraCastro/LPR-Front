<?php

namespace LPR\Model\domain;
require __DIR__ . '/../../../vendor/autoload.php';

class Funcionario extends Usuario
{

    public $email;
    public $senha;

    function __construct($id, $nome, $cpf, $rua, $numero, $bairro, $telefone, $email, $senha)
    {
        parent::__construct($id, $nome, $cpf, $rua, $numero, $bairro, $telefone);
        $this->email = $email;
        $this->senha = $senha;
    }
}