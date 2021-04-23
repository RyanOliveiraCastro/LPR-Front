<?php
namespace LPR\Model\domain;
require __DIR__ . '/../../../vendor/autoload.php';

class Usuario
{
    public $id;

    public $nome;

    public $cpf;

    public $rua;

    public $numero;

    public $bairro;

    public $telefone;

    public function __construct($id, $nome, $cpf, $rua, $numero, $bairro, $telefone)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->telefone = $telefone;
    }
}