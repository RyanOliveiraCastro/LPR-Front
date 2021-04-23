
$('#listSigla').change(function () {
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
});

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
});