<?php
require __DIR__ . '/vendor/autoload.php';

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);
/*
 * Controllers
 */
$router->namespace("LPR\Controller");

/*
 * INDEX
 * REDIRECT
 */

$router->group(null);
$router->get("/", "LoginController:redirectCliente");
$router->get("/login", "LoginController:redirectCliente");
$router->get("/sair", "LoginController:sair");
$router->get("/loginCliente", "LoginController:redirectCliente");
$router->get("/loginFuncionario", "LoginController:redirectFuncionario");
$router->get("/loginProtetico", "LoginController:redirectProtetico");


$router->post("/logarFuncionario", "LoginController:logarFuncionario");
$router->post("/logarCliente", "LoginController:logarCliente");
$router->post("/logarProtetico", "LoginController:logarProtetico");

$router->get("/relatorio", "RelatorioController:redirect");
$router->get("/relatorio/clienteComDebito", "RelatorioController:clienteComDebito");
$router->get("/relatorio/osPeriodoCliente", "RelatorioController:osPeriodoCliente");
$router->get("/relatorio/osComDebito", "RelatorioController:osComDebito");
$router->get("/relatorio/servicoRealizado", "RelatorioController:servicoRealizado");
$router->get("/relatorio/transportePorCliente", "RelatorioController:transportePorCliente");
$router->get("/relatorio/comissaoFuncionario", "RelatorioController:comissaoFuncionario");
$router->get("/relatorio/servicoPorCliente", "RelatorioController:servicoPorCliente");
$router->get("/relatorio/metodoPagamento", "RelatorioController:metodoPagamento");

$router->get("/listagem", "ListagemController:redirect");
$router->get("/listagem/uf", "ListagemController:uf");
$router->get("/listagem/cidade", "ListagemController:cidade");
$router->get("/listagem/bairro", "ListagemController:bairro");
$router->get("/listagem/protetico", "ListagemController:protetico");
$router->get("/listagem/funcionario", "ListagemController:funcionario");
$router->get("/listagem/cliente", "ListagemController:cliente");
$router->get("/listagem/tipoServico", "ListagemController:tipoServico");
$router->get("/listagem/etapa", "ListagemController:etapa");
$router->get("/listagem/pagamento", "ListagemController:pagamento");
$router->get("/listagem/ordemServico", "ListagemController:ordemServico");
$router->get("/listagem/pagamento", "ListagemController:pagamento");
$router->get("/listagem/tabelaPreco", "ListagemController:tabelaPreco");
$router->get("/listagem/transporte", "ListagemController:transporte");
$router->get("/listagem/caixa", "ListagemController:caixa");


$router->get("/cadastro", "CadastroController:redirect");
$router->get("/cadastro/uf", "UfController:redirect");
$router->post("/cadastro/ufInserir", "UfController:ufInserir");

$router->get("/cadastro/cidade", "CidadeController:redirect");
$router->post("/cadastro/cidadeInserir", "CidadeController:cidadeInserir");

$router->get("/cadastro/bairro", "BairroController:redirect");
$router->post("/cadastro/bairroInserir", "BairroController:bairroInserir");

$router->get("/cadastro/tipoServico", "TipoServicoController:redirect");
$router->post("/cadastro/tipoServicoInserir", "TipoServicoController:tipoServicoInserir");

$router->get("/cadastro/tipoCliente", "TipoClienteController:redirect");
$router->post("/cadastro/tipoClienteInserir", "TipoClienteController:tipoClienteInserir");

$router->get("/cadastro/tabelaPreco", "TabelaPrecoController:redirect");
$router->post("/cadastro/tabelaPrecoInserir", "TabelaPrecoController:tabelaPrecoInserir");

$router->get("/cadastro/funcionario", "FuncionarioController:redirect");
$router->post("/cadastro/funcionarioInserir", "FuncionarioController:funcionarioInserir");

$router->get("/cadastro/protetico", "ProteticoController:redirect");

$router->get("/cadastro/cliente", "ClienteController:redirect");
$router->post("/cadastro/clienteInserir", "ClienteController:clienteInserir");

$router->get("/cadastro/protetico", "ProteticoController:redirect");
$router->post("/cadastro/proteticoInserir", "ProteticoController:proteticoInserir");

$router->get("/servico", "ServicoController:redirect");
$router->get("/os", "OSController:redirect");
$router->post("/osInserir", "OSController:OsInserir");

$router->get("/osAlterar/{id}", "OSController:redirectAlterar");
$router->get("/osVisualizar/{id}", "OSController:redirectVisualizar");
$router->get("/pagamentoVisualizar", "PagamentoController:redirectVisualizar");
$router->get("/transporteVisualizar", "TransporteController:redirectVisualizar");

$router->get("/transporte", "TransporteController:redirect");
$router->post("/transporteInserir", "TransporteController:transporteInserir");
$router->post("/transporteAtualizar", "TransporteController:transporteAtualizar");

$router->get("/pagamento", "PagamentoController:redirect");
$router->post("/pagamentoInserir", "PagamentoController:pagamentoInserir");
$router->post("/pagamentoAtualizar", "PagamentoController:pagamentoAtualizar");

$router->get("/comissao", "ComissaoController:redirect");
$router->get("/tabelaPreco/cliente/{clienteId}", "TabelaPrecoController:buscarTabela");

$router->get("/perfil", "IndexController:perfil");



/*$router->get("/logout", "LogoutController:logout");

$router->get("/documentoSetor", "DocumentoSetorController:redirectView");
$router->get("/documentoSetor/searchDocumento", "DocumentoSetorController:searchDocumento");
$router->get("/documentoSetor/abrirDocumento/{nome}", "DocumentoSetorController:abrirDocumento");
$router->get("/setor/getByGrupo", "SetorController:getByGrupo");

$router->get("/boletimInformativo", "BoletimInformativoController:redirectView");
$router->get("/boletimInformativo/searchBoletim", "BoletimInformativoController:searchBoletim");
$router->get("/boletimInformativo/abrirBoletim/{nome}", "BoletimInformativoController:abrirBoletim");

$router->get("/cardapio", "CardapioController:abrirCardapio");

$router->get("/formMinistSaude", "DocumentoMsController:redirectView");
$router->get("/formMinistSaude/searchDocumentoMS", "DocumentoMsController:searchDocumentoMS");
$router->get("/formMinistSaude/abrirDocumentoMS/{nome}", "DocumentoMsController:abrirDocumentoMS");

$router->get("/email", "EmailController:redirectView");
$router->get("/email/getBySetor", "EmailController:getBySetor");
$router->get("/email/searchEmail", "EmailController:searchEmail");

$router->get("/ramal", "RamalController:redirectView");
$router->get("/ramal/searchRamal", "RamalController:searchRamal");

$router->get("/aniversariante", "AniversarianteController:redirectView");
$router->get("/aniversariante/searchAniversario", "AniversarianteController:searchAniversario");


$router->group("login");
$router->get("/", "LoginController:redirect");
$router->POST("/verifica-login", "LoginController:verificaLogin");
//$router->get("/{id}", "lloginController:redirect");

$router->group("painel-controle");
$router->get("/documentoSetor", "DocumentoSetorController:redirect");
$router->get("/documentoSetor/searchDocumento", "DocumentoSetorController:searchDocumento");
$router->post("/documentoSetor/addDocumento", "DocumentoSetorController:addDocumento");
$router->get("/documentoSetor/removeDocumento/{id}","DocumentoSetorController:removeDocumento");
$router->get("/documentoSetor/abrirDocumento/{nome}", "DocumentoSetorController:abrirDocumento");

$router->get("/tipoDocumento", "TipoDocumentoController:redirectTipoDocumento");
$router->post("/tipoDocumento/addTipoDocumento", "TipoDocumentoController:addTipoDocumento");
$router->get("/tipoDocumento/removeTipoDocumento/{id}","TipoDocumentoController:removeTipoDocumento");
$router->get("/tipoDocumento/searchTipoDocumento", "TipoDocumentoController:searchTipoDocumento");

$router->get("/boletimInformativo", "BoletimInformativoController:redirect");
$router->get("/boletimInformativo/searchBoletim", "BoletimInformativoController:searchBoletim");
$router->post("/boletimInformativo/addBoletim", "BoletimInformativoController:addBoletim");
$router->get("/boletimInformativo/abrirBoletim/{nome}", "BoletimInformativoController:abrirBoletim");
$router->get("/boletimInformativo/removeBoletim/{id}", "BoletimInformativoController:removeBoletim");

$router->get("/formMinistSaude", "DocumentoMsController:redirect");
$router->get("/formMinistSaude/searchDocumentoMS", "DocumentoMsController:searchDocumentoMS");
$router->post("/formMinistSaude/addDocumentoMS", "DocumentoMsController:addDocumentoMS");
$router->get("/formMinistSaude/abrirDocumentoMS/{nome}", "DocumentoMsController:abrirDocumentoMS");
$router->get("/formMinistSaude/removeFormMS/{id}", "DocumentoMsController:removeFormMS");

$router->get("/banner", "BannerController:redirect");
$router->post("/banner/carregaImagem", "BannerController:carregaImagem");

$router->get("/cardapio", "CardapioController:redirect");
$router->post("/cardapio/carregaCardapio", "CardapioController:carregaCardapio");

$router->get("/setor", "SetorController:redirect");
$router->get("/setor/getByGrupo", "SetorController:getByGrupo");
$router->get("/setor/searchSetor", "SetorController:searchSetor");
$router->get("/setor/removeSetor/{id}", "SetorController:removeSetor");
$router->post("/setor/addSetor", "SetorController:addSetor");

$router->get("/email", "EmailController:redirect");
$router->get("/email/searchEmail", "EmailController:searchEmail");
$router->get("/email/getBySetor", "EmailController:getBySetor");
$router->post("/email/addEmail", "EmailController:addEmail");
$router->get("/email/removeEmail/{id}", "EmailController:removeEmail");

$router->get("/usuario", "UsuarioController:redirect");
$router->get("/novoUsuario", "UsuarioController:redirectNovoUsuario");
$router->get("/usuario/searchUsuario", "UsuarioController:searchUsuario");
$router->post("/usuario/addUsuario", "UsuarioController:addUsuario");
$router->get("/usuario/removeUsuario/{id}", "UsuarioController:removeUsuario");
$router->get("/novoUsuario/loadUsuario/{id}", "UsuarioController:loadUsuario");

$router->get("/ramal", "RamalController:redirect");
$router->get("/ramal/searchRamal", "RamalController:searchRamal");
$router->post("/ramal/addRamal", "RamalController:addRamal");
$router->get("/ramal/removeRamal/{id}", "RamalController:removeRamal");

*/

$router->group("ooops");
$router->get("/{errcode}", "IndexController:error");

$router->dispatch();

if ($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}