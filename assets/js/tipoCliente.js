
$('#listTipoCliente').change(function () {

    if ($(this).val() != 0) {
        $.getJSON('http://localhost:8080/tipoCliente/' + $("#listTipoCliente").val(), {
            },
            function (data) {
                document.getElementById("id").value = data['id'];
                document.getElementById("nome").value = data['nome'];
                document.getElementById("listTabelaPreco").value = data['tabelaPreco']['id'];
            }
        )
    }else{
        if($(this).val() == 0){
            document.getElementById("id").value = "";
            document.getElementById("nome").value = "";
            document.getElementById("listTabelaPreco").value = "";
        }
    }
});
