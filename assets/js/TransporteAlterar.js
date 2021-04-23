
var osId = $('#listOrdemServico').val();
var servicoId = $('#listServico').val()

$('#listOrdemServico').load("", function () {
        $.getJSON('http://localhost:8080/transporte/' + osId + '/' + servicoId, {})
            .done(
                function (data) {
                    $('#listOrdemServico').html(
                        '<option value="' + osId + '">' + osId + '</option>'
                    ).show();
                    document.getElementById("listOrdemServico").value = data['ordemServicoId'];
                    document.getElementById("listServico").value = data['servicoId'];
                    document.getElementById("previsaoEntrega").value = data['dataEntrega'];
                    document.getElementById("listFormaTransporte").value = data['formaTransporte'];
                    document.getElementById("valor").value = data['valor'];
                },
            )

});