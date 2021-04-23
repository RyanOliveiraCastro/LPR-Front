
$('#listServico').change(function () {

    if ($(this).val() != 0) {
        $.getJSON('http://localhost:8080/tipoServico/' + $("#listServico").val(), {
            },
            function (data) {
                document.getElementById("id").value = data['id'];
                document.getElementById("servico").value = data['nome'];
                document.getElementById("material").value = data['material'];
                document.getElementById("comissao").value = data['comissao'];
            }
        )
    }else{
        if($(this).val() == 0){
            document.getElementById("id").value = "";
            document.getElementById("servico").value = "";
            document.getElementById("material").value = "";
            document.getElementById("comissao").value = "";
        }
    }
});
