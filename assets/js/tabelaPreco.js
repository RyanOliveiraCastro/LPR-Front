var count = 0;

$('#listTabelaPreco').change(function () {
    $("#itensTabelaPreco").empty();
    if ($(this).val() != 0) {
        $.getJSON('http://localhost:8080/tabelaPreco/' + $("#listTabelaPreco").val(), {})
            .done(
                function (data) {
                    document.getElementById("id").value = data['id'];
                    document.getElementById("tabelaPreco").value = data['descricao'];
                    var options = "";
                    var itens = data['itens'];
                    for (count = 0; count < itens.length; count++) {

                        document.getElementById("contador").value = count;
                        options = '<div class="listTabelaPreco">' +
                            '   <label for="servico_' + count + '">Serviço' +
                            '        <select id="servico_' + count + '" name="nListServico_' + count + '">' +
                            '         </select>' +
                            '   </label>' +
                            '   <label for="prazo_' + count + '">Prazo' +
                            '       <input id="prazo_' + count + '" name="nPrazo_' + count + '" placeholder="Prazo" type="number" value="' + itens[count]['prazo'] + '">' +
                            '  </label>' +
                            '   <label for="valor_' + count + '">Valor' +
                            '       <input id="valor_' + count + '" name="nValor_' + count + '" placeholder="Valor" type="number" value="' + itens[count]['valor'] + '">' +
                            '  </label>' +
                            '<label>' +
                            '<i id="excluir_' + count + '" onclick="excluir(' + count + ')" class="far fa-trash-alt fa-2x" style="margin: 45px 10px"></i>' +
                            '</label>' +
                        ' </div>';
                        carregaTipoServico(count, itens[count]['tipoServico']['id']);

                        $('#itensTabelaPreco').append(options);
                    }
                    count--;
                }
            )
    } else {
        if ($(this).val() == 0) {
            document.getElementById("tabelaPreco").value = "";
            document.getElementById("id").value = "";
        }
    }
});

$('#addServico').click(function () {
    document.getElementById("contador").value = count;
    var options = '<div class="listTabelaPreco">' +
        '   <label for="servico_' + count + '">Serviço' +
        '        <select id="servico_' + count + '" name="nListServico_' + count + '">' +
        '         </select>' +
        '   </label>' +
        '   <label for="prazo_' + count + '">Prazo' +
        '       <input id="prazo_' + count + '" name="nPrazo_' + count + '" placeholder="Prazo" type="number">' +
        '  </label>' +
        '   <label for="valor_' + count + '">Valor' +
        '       <input id="valor_' + count + '" name="nValor_' + count + '" placeholder="Valor" type="number">' +
        '  </label>' +
        '<label>' +
        '<i id="excluir_' + count + '" onclick="excluir(' + count + ')" class="far fa-trash-alt fa-2x" style="margin: 45px 10px"></i>' +
        '</label>' +
        ' </div>';

    carregaTipoServico(count, 0);

    $('#itensTabelaPreco').append(options);
    count++
})


function carregaTipoServico(count, id) {
    $.getJSON('http://localhost:8080/tipoServico', {})
        .done(
            function (data) {

                var options = "";
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i]['id'] + '">' + data[i]['nome'] + '</option>';
                }
                $('#servico_' + count).append(options);
                if(id != 0) {
                    document.getElementById('servico_' + count).value = id;
                }
            }
        )
}

function excluir(id) {
    document.getElementById('servico_' + id).parentNode.parentNode.remove();
    count--;
}

/*
$('#listSigla').load(null, function () {
    if ($(this).val() != 0) {
        $.getJSON('http://localhost:8080/uf/' + $("#listSigla").val(), {
            },
            function (j) {
                document.getElementById("id").value = j['id'];
                document.getElementById("sigla").value = j['sigla'];
                document.getElementById("estado").value = j['nome'];
            }
        )
    }else{
        if($(this).val() == 0){
            document.getElementById("id").value = "";
            document.getElementById("sigla").value = "";
            document.getElementById("estado").value = "";
        }
    }
});*/