$(document).ready(function() {
    // Ao enviar o formulário, faça a busca por AJAX
    $('#formConsulta').submit(function(event) {
        event.preventDefault(); // Evita que o formulário seja enviado da forma convencional

        // Obtenha o valor digitado no campo de pesquisa
        var consulta = $(this).find('input[name="consulta"]').val();

        // Faça a requisição AJAX para a API PHP
        $.ajax({
            url: '../PHP/consultaacesso.php',
            type: 'GET',
            data: { consulta: consulta },
            dataType: 'json',
            success: function(response) {
                // Limpe a tabela antes de exibir os novos resultados
                $('#resultadoBusca').empty();

                // Insira os novos resultados na tabela
                $.each(response, function(index, acesso) {
                    var row = '<tr>';
                    row += '<td>' + acesso.nomeA + '</td>';
                    row += '<td>' + acesso.email + '</td>';
                    row += '<td>' + acesso.senha + '</td>';
                    row += '<td>' + acesso.nameLogin + '</td>';
                    row += '<td>' + acesso.link + '</td>';
                    row += '</tr>';
                    $('#resultadoBusca').append(row);
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});