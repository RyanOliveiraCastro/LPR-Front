
var osId = $('#listOrdemServico').val();
var servicoId = $('#listServico').val()

$('#listOrdemServico').load('http://localhost:8080/pagamento/' + osId + '/' + servicoId, function () {
        $.getJSON('http://localhost:8080/pagamento/' + osId + '/' + servicoId, {})
            .done(
                function (data) {
                    $('#listOrdemServico').html(
                        '<option value="' + osId + '">' + osId + '</option>'
                    ).show();
                    document.getElementById("listOrdemServico").value = data['ordemServicoId'];
                    document.getElementById("previsaoEntrega").value = data['dataPagamento'];
                    document.getElementById("listServico").value = data['servicoId'];
                    document.getElementById("listFormaPagamento").value = data['formaPagamento'];
                    if(data['pago'] == true){
                        document.getElementById("listPago").value = 1
                    }else{
                        document.getElementById("listPago").value =2
                    }

                },
            )

});