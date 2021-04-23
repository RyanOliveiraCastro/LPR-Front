$('#listSigla').change(function () {
    if ($(this).val()) {

        $.getJSON('http://localhost:8080/cidade/uf/' + $("#listSigla").val(), {},
            function (j) {

                if (j == "") {
                    $("#listCidade").html('<option value="0">Nova Cidade</option>');
                } else {
                    var options;
                    options += '<option value="0">Nova Cidade</option>';
                    for (var i = 0; i < j.length; i++) {
                        options += '<option value="' + j[i]['id'] + '">' + j[i]['nome'] + '</option>';
                    }
                    $('#listCidade').html(options).show();
                }
                document.getElementById("id").value = "";
                document.getElementById("cidade").value = ""
            }
        )
    }
});

$('#listCidade').change(function () {
    if ($('#listCidade') != 0) {
        $.getJSON('http://localhost:8080/cidade/' + $('#listCidade').val(), {},
            function (j) {
                document.getElementById("id").value = j['id'];
                document.getElementById("cidade").value = j['nome'];
            }
        )
    } else {
        if ($(this).val() == 0) {
            document.getElementById("id").value = "";
            document.getElementById("cidade").value = "";
        }
    }
});

$('#listCidade').load('http://localhost:8080/cidade/uf/' + $("#listSigla").val(), function () {
    $.getJSON('http://localhost:8080/cidade/uf/' + $("#listSigla").val(), {},
        function (j) {

            if (j == "") {
                $("#listCidade").html('<option value="0">Nova Cidade</option>');
            } else {
                var options;
                options += '<option value="0">Nova Cidade</option>';
                for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i]['id'] + '">' + j[i]['nome'] + '</option>';
                }
                $('#listCidade').html(options).show();
            }
        }
    )
});