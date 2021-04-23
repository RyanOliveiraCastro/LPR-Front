<?php

namespace LPR\Controller;

class IndexController{

    public function redirect(){
        require __DIR__ . "/../../view/home.php";
    }

    public function error($data){
    }

    public function mostralModal($titulo, $corpo)
    {
        return '<div class="modal" id="pesquisaModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                    <div class="modal-header">
                        <p>'.$titulo.'</p>
                   </div>
                  <div class="modal-body">
                        <p>'.$corpo.'</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
     ';
    }

    public function perfil(){
        @session_start();
        if(!empty($_SESSION['cliente_id'])){
            require __DIR__ . "/../../view/cadastro/perfilCliente.php";
        }else if (!empty($_SESSION['funcionario_id'])) {
            require __DIR__ . "/../../view/cadastro/perfilFuncionario.php";
        }else{
            require __DIR__ . "/../../view/cadastro/perfilProtetico.php";
        }
    }

}