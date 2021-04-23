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
                                    $("#listBairro").html('<option value="0">Novo Bairro</option>');
                                } else {
                                    var options;
                                    options += '<option value="0">Novo Bairro</option>';
                                    for (var i = 0; i < j.length; i++) {
                                        options += '<option value="' + j[i]['id'] + '">' + j[i]['nome'] + '</option>';
                                    }
                                    $('#listBairro').html(options).show();
                                }
                                document.getElementById("id").value = "";
                                document.getElementById("bairro").value = ""
                            }
                        )

                }
            )
    }
});

//Carrega Bairro de acordo com Cidade
$('#listCidade').change( function () {
    if ($(this).val()) {
        $.getJSON('http://localhost:8080/bairro/cidade/' + $("#listCidade").val(), {})
            .done(
                function (j) {
                    if (j == "") {
                        $("#listBairro").html('<option value="0">Novo Bairro</option>');
                    } else {
                        var options;
                        options += '<option value="0">Novo Bairro</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i]['id'] + '">' + j[i]['nome'] + '</option>';
                        }
                        $('#listBairro').html(options).show();
                    }
                    document.getElementById("id").value = "";
                    document.getElementById("bairro").value = ""
                }
            )
    }
});

//Preenche Bairro
$('#listBairro').change(async function () {
    if ($(this).val() != 0) {
        $.getJSON('http://localhost:8080/bairro/' + $(this).val(), {})
            .done(
                function (j) {
                    document.getElementById("id").value = j['id'];
                    document.getElementById("bairro").value = j['nome'];
                }
            )
    } else {
        if ($(this).val() == 0) {
            document.getElementById("id").value = "";
            document.getElementById("bairro").value = "";
        }
    }
});


//Carrega Cidades e Bairros ao Iniciar a Pagina
$('#listCidade').load('http://localhost:8080/cidade/uf/' + $("#listSigla").val(), async function () {
    await $.getJSON('http://localhost:8080/cidade/uf/' + $("#listSigla").val(), {})
        .done(
            function (j) {

                if (j == "") {
                    $("#listCidade").html('<option value="0">Novo Bairro</option>');
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
                    $("#listBairro").html('<option value="0">Novo Bairro</option>');
                } else {
                    var options;
                    options += '<option value="0">Novo Bairro</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i]['id'] + '">' + j[i]['nome'] + '</option>';
                    }
                    $('#listBairro').html(options).show();
                }
            }
        );

});



