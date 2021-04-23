var url = window.location.href;

var id = url.split("/");
var status = "";
document.getElementById("id").value = id[5];

$('#id').load('http://localhost:8080/ordemServico/' + id[5], async function () {
    if ($(this).val() != 0) {
        $.getJSON('http://localhost:8080/ordemServico/' + id[5], {})
            .done(
                async function (data) {
                    listCaixa();
                    listStatus(document.getElementById("listStatus").value = data['atualizacaoEtapa']);

                    status = data['atualizacaoEtapa'];
                    document.getElementById("id").value = data['id'];
                    document.getElementById("listDentista").value = data['cliente']['id'];
                    document.getElementById("paciente").value = data['paciente'];

                    document.getElementById("servicoId").value = data['itens'][0]['servico']['id'];

                    document.getElementById("entrega").value = data['entrega']
                    document.getElementById("listFuncionario").value = data['funcionario']['id'];
                    document.getElementById("listProtetico").value = data['protetico']['id'];

                    document.getElementById("listStatus").value = data['atualizacaoEtapa'];
                    document.getElementById("observacao").value = data['observacao'];
                    setTimeout(preencheCampos, 300);

                    function preencheCampos() {
                        document.getElementById("listCaixa").value = data['itens'][0]['servico']['caixa']['id'];
                        document.getElementById("listStatus").value = data['atualizacaoEtapa'];
                        document.getElementById("listServico").value = data['itens'][0]['servico']['tipoServico']['id'];
                    }
                }
            )

    } else {
        if ($(this).val() == 0) {
            listCaixaNotUsed();
            $("#listStatus").empty();

            //document.getElementById("listStatus").value = RECEBIDA;
            document.getElementById("id").value = '';
            document.getElementById("listDentista").value = '';
            document.getElementById("paciente").value = '';
            document.getElementById("listServico").value = '';
            document.getElementById("servicoId").value = '';
            document.getElementById("entrega").value = '';
            document.getElementById("listFuncionario").value = '';
            document.getElementById("listProtetico").value = '';
            document.getElementById("listStatus").value = '';
            document.getElementById("observacao").value = '';
            $('#listStatus').html('<option value="RECEBIDA">RECEBIDA</option>').show();

        }
    }

});

$('#listServico').load('http://localhost:8080/tabelaPreco/cliente/' + $("#listDentista").val(), function () {
    if ($("#listDentista").val()) {
        $.getJSON('http://localhost:8080/tabelaPreco/cliente/' + $("#listDentista").val(), {},
            function (j) {
                var options;
                var tabelaPreco = j['tabelaPreco'];
                for (var i = 0; i < tabelaPreco['itens'].length; i++) {
                    options += '<option value="' + tabelaPreco['itens'][i]['tipoServico']['id'] + '">' + tabelaPreco['itens'][i]['tipoServico']['nome'] + '</option>';
                }
                $('#listServico').html(options).show();

                document.getElementById("tipoCliente").value = (j['id']);
                document.getElementById("tabelaPreco").value = tabelaPreco['id'];
            }
        )
    }
});

function listCaixa() {
    $.getJSON('http://localhost:8080/caixa', {})
        .done(
            function (data) {
                if (data == "") {
                } else {
                    var options;
                    for (var i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i]['id'] + '">' + data[i]['id'] + '</option>';
                    }
                    $('#listCaixa').html(options).show();
                }
            }
        )
}

function listCaixaNotUsed() {
    $.getJSON('http://localhost:8080/caixa/notUsed', {})
        .done(
            function (data) {
                if (data == "") {
                } else {
                    var options;
                    for (var i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i]['id'] + '">' + data[i]['id'] + '</option>';
                    }
                    $('#listCaixa').html(options).show();
                }
            }
        )
}

function listStatus(status) {
    $.getJSON('http://localhost:8080/servico/status', {})
        .done(
            function (data) {
                if (data == "") {
                } else {
                    var i = 0;
                    if (status == "FINALIZADA") {
                        i = 5;
                    } else if (status == "ENVIADO") {
                        i = 6;
                    } else if (status == "ENTREGUE") {
                        i = 7;
                    }
                    var options;
                    for (i; i < data.length; i++) {

                        options += '<option value="' + data[i] + '">' + data[i] + '</option>';
                    }
                    $('#listStatus').html(options).show();
                }
            }
        )
}

$('#listStatus').change(async function () {
    $.getJSON('http://localhost:8080/pagamento/isPago/' + id[5], {})
        .done(
            function (data) {
                if (($('#listStatus').val() == "ENVIADO" || $('#listStatus').val() == "ENTREGUE") && data == false) {
                    alert("Ordem de Serviço com Pagamento em Aberto");
                    document.getElementById("listStatus").value = status;
                }

            }
        )
});