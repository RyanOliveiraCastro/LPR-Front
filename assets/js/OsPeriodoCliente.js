$('#pesquisa').click(function () {
    if ($('#iDtIni').val() != "" && $('#iDtFim').val() != "" && $('#listDentista').val() != "") {
        $.getJSON('http://localhost:8080/relatorio/OSPeriodoCliente/' + $('#iDtIni').val() + '/' + $('#iDtFim').val() + '/' + $('#listDentista').val(), {})
            .done(function (data) {
                if (data == "") {
                    alert("Nenhum valor encontrado");
                    $('#tabela').children().remove();
                } else {

                    var html = "<table class='table' style='width: 95%; margin:2.5%; border:2px solid black'>" +
                        "<thead>" +
                        "<tr>" +
                        "<th style='border-bottom:2px solid black' scope='col'>ID</th>" +
                        "<th style='border-bottom:2px solid black' scope='col'>CLIENTE</th>" +
                        "<th style='border-bottom:2px solid black' scope='col'>RECEBIDO</th>" +
                        "<th style='border-bottom:2px solid black' scope='col'>VALOR</th>" +
                        "<th style='border-bottom:2px solid black' scope='col'>SERVICO</th>" +
                        "</tr>" +
                        "</thead>" +
                        "<tbody>";

                    for (const element of data) {
                        html += "<tr scope='row'>" +
                            "<td style='border-top:1px solid black'>" + element[0] + "</td>" +
                            "<td style='border-top:1px solid black'>" + element[1] + "</td>" +
                            "<td style='border-top:1px solid black'>" + dataAtualFormatada(element[2]) + "</td>" +
                            "<td style='border-top:1px solid black'>" + element[4] + "</td>" +
                            "<td style='border-top:1px solid black'>" + element[6] + "</td>" +
                            "</tr>"
                    }
                    html += "</tbody> </table>";

                    $('#tabela').html(html).show();
                }
            })
    } else {
        alert("Preencha todos os Campos");
    }

});


function dataAtualFormatada(data) {
    var data = new Date(data);
    dia = data.getDate().toString(),
        diaF = (dia.length == 1) ? '0' + dia : dia,
        mes = (data.getMonth() + 1).toString(), //+1 pois no getMonth Janeiro começa com zero.
        mesF = (mes.length == 1) ? '0' + mes : mes,
        anoF = data.getFullYear();
    return diaF + "/" + mesF + "/" + anoF;
}