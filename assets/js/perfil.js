
let idCliente = $("#listCliente").val();
let idFuncionario = $('#listFuncionario').val();


$('#listCliente').load('http://localhost:8080/cliente/' + idCliente ,async function () {
    if ($(this).val() != 0) {
        $.getJSON('http://localhost:8080/cliente/' + idCliente,)
            .done(
                async function (data) {

                    await setTimeout(carregaCidade(data['bairro']['cidade']['uf']['id']), 100);
                    await setTimeout(carregaBairro(data['bairro']['cidade']['id']), 100);
                    document.getElementById("id").value = data['id'];
                    document.getElementById("nome").value = data['nome'];
                    document.getElementById("telefone").value = data['telefone']['numero'];
                    document.getElementById("telefoneId").value = data['telefone']['id'];
                    document.getElementById("email").value = data['email'];
                    document.getElementById("listSigla").value = data['bairro']['cidade']['uf']['id'];
                    document.getElementById("numero").value = data['numero'];
                    document.getElementById("rua").value = data['rua'];
                    document.getElementById("cpf").value = data['cpf'];
                    document.getElementById("senha").value = data['senha'];
                    document.getElementById("cro").value = data['cro'];
                    setTimeout(preencheCidadeBairro, 100);

                    $('#listCliente').html(
                        '<option value="' + data['id'] + '">' + data['nome'] + '</option>'
                    ).show();

                    function preencheCidadeBairro() {
                        document.getElementById("listCidade").value = data['bairro']['cidade']['id'];
                        document.getElementById("listBairro").value = data['bairro']['id'];
                    }
                }
            )

    } else {
        if ($(this).val() == 0) {
            document.getElementById("id").value = '';
            document.getElementById("nome").value = '';
            document.getElementById("telefone").value = '';
            document.getElementById("telefoneId").value = '';
            document.getElementById("email").value = '';
            document.getElementById("listSigla").value = '';
            document.getElementById("numero").value = '';
            document.getElementById("rua").value = '';
            document.getElementById("cpf").value = '';
            document.getElementById("senha").value = '';
            document.getElementById("cro").value = '';
            document.getElementById("listCidade").value = '';
            document.getElementById("listBairro").value = '';
        }
    }

});

$('#listFuncionario').load('http://localhost:8080/funcionario/' + idFuncionario ,async function () {
    if ($('#listFuncionario').val() != 0) {
        $.getJSON('http://localhost:8080/funcionario/' + idFuncionario,)
            .done(
                async function (data) {

                    await setTimeout(carregaCidade(data['bairro']['cidade']['uf']['id']), 100);
                    await setTimeout(carregaBairro(data['bairro']['cidade']['id']), 100);
                    document.getElementById("id").value = data['id'];
                    document.getElementById("nome").value = data['nome'];
                    document.getElementById("telefone").value = data['telefone']['numero'];
                    document.getElementById("telefoneId").value = data['telefone']['id'];
                    document.getElementById("email").value = data['email'];
                    document.getElementById("listSigla").value = data['bairro']['cidade']['uf']['id'];
                    document.getElementById("numero").value = data['numero'];
                    document.getElementById("rua").value = data['rua'];
                    document.getElementById("cpf").value = data['cpf'];
                    document.getElementById("senha").value = data['senha'];
                    setTimeout(preencheCidadeBairro, 100);

                    $('#listFuncionario').html(
                        '<option value="' + data['id'] + '">' + data['nome'] + '</option>'
                    ).show();

                    function preencheCidadeBairro() {
                        document.getElementById("listCidade").value = data['bairro']['cidade']['id'];
                        document.getElementById("listBairro").value = data['bairro']['id'];
                    }
                }
            )

    } else {
        if ($(this).val() == 0) {
            document.getElementById("id").value = '';
            document.getElementById("nome").value = '';
            document.getElementById("telefone").value = '';
            document.getElementById("telefoneId").value = '';
            document.getElementById("email").value = '';
            document.getElementById("listSigla").value = '';
            document.getElementById("numero").value = '';
            document.getElementById("rua").value = '';
            document.getElementById("cpf").value = '';
            document.getElementById("senha").value = '';
            document.getElementById("cro").value = '';
            document.getElementById("listCidade").value = '';
            document.getElementById("listBairro").value = '';
        }
    }

});


//Carrega Cidade Baseado na UF
$('#listSigla').change(async function () {
    if ($(this).val()) {
        await $.getJSON('http://localhost:8080/cidade/uf/' + $("#listSigla").val(), {})
            .done(
                function (j) {
                    if (j == "") {
                    } else {
                        var options;
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i]['id'] + '">' + j[i]['nome'] + '</option>';
                        }
                        $('#listCidade').html(options).show();
                    }

                    $.getJSON('http://localhost:8080/bairro/cidade/' + $("#listCidade").val(), {})
                        .done(
                            function (j) {
                                if (j == "") {
                                    $("#listBairro").html('<option value="0">Não há Bairros Disponíveis</option>');
                                } else {
                                    var options;

                                    for (var i = 0; i < j.length; i++) {
                                        options += '<option value="' + j[i]['id'] + '">' + j[i]['nome'] + '</option>';
                                    }
                                    $('#listBairro').html(options).show();
                                }
                            }
                        )
                }
            )
    }
});

//Carrega Bairro de acordo com Cidade
$('#listCidade').change(function () {
    if ($(this).val()) {
        $.getJSON('http://localhost:8080/bairro/cidade/' + $("#listCidade").val(), {})
            .done(
                function (j) {
                    if (j == "") {
                        $("#listBairro").html('<option value="0">Não há Bairros Disponíveis</option>');
                    } else {
                        var options;

                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i]['id'] + '">' + j[i]['nome'] + '</option>';
                        }
                        $('#listBairro').html(options).show();
                    }
                }
            )
    }
});

function carregaCidade(listUf) {
    $.getJSON('http://localhost:8080/cidade/uf/' + listUf, {})
        .done(
            function (data) {
                if (data == "") {

                } else {
                    var options;
                    for (var i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i]['id'] + '">' + data[i]['nome'] + '</option>';
                    }
                    $('#listCidade').html(options).show();
                }
            }
        )
}

function carregaBairro(listCidade) {
    $.getJSON('http://localhost:8080/bairro/cidade/' + listCidade, {})
        .done(
            function (data) {
                if (data == "") {
                } else {
                    var options;
                    for (var i = 0; i < data.length; i++) {
                        options += '<option value="' + data[i]['id'] + '">' + data[i]['nome'] + '</option>';
                    }
                    $('#listBairro').html(options).show();
                }
            }
        )
}

