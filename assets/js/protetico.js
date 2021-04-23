$('#listProtetico').change(async function () {
    if ($(this).val() != 0) {
        $.getJSON('http://localhost:8080/protetico/' + $("#listProtetico").val(),)
            .done(
                async function (data) {
                    await carregaCidade(data['bairro']['cidade']['uf']['id']);
                    await carregaBairro(data['bairro']['cidade']['id']);
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
                    setTimeout(preencheCidadeBairro, 150);

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

//Carrega Cidades e Bairros ao Iniciar a Pagina
$('#listCidade').load('http://localhost:8080/cidade/uf/' + $("#listSigla").val(), async function () {
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
            }
        )
    await $.getJSON('http://localhost:8080/bairro/cidade/' + $("#listCidade").val(), {})
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
        );
});

function carregaCidade(listUf) {
    $.getJSON('http://localhost:8080/cidade/uf/' + listUf, {})
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
            }
        )
}

function carregaBairro(listCidade) {
    $.getJSON('http://localhost:8080/bairro/cidade/' + listCidade, {})
        .done(
            function (j) {
                if (j == "") {
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

