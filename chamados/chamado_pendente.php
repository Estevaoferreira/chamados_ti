<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chamados pendentes</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/icones/todos/favicon.ico">
    <link rel="stylesheet" type="text/css" href="estilos/style.css">
    <link href="estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <style type="text/css">
        body{
            background-color: #71D0F7;
            font-family: 'Roboto', sans-serif;
        }
        h1{
            color: white;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #tabela a {
            display: block;
            text-align: center;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            background-color: #258DCA;
        }
        .home-icon {
            position: fixed;
            top: 20px;
            left: 20px;
            font-size: 30px;
            color: #000;
            text-decoration: none;
        }
        svg {
            font-size: 30px;
            color: blanchedalmond;
            text-decoration: none;
        }
        /* adicione esta regra de estilo para tornar a tabela responsiva */
        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

    </style>
    <script>
     function atualizarTabela() {
    // enviar uma solicitação AJAX para o servidor PHP
        $.ajax({
            url: 'atualizar_tabela_2.php',
            dataType: 'json',
            success: function(dados) {
            // atualizar a tabela HTML com os dados recebidos
                $('#tabela').html('');
                $.each(dados, function(index, value) {
                    console.log(value.cod_chamado);
                    var botao = $('<a>').text('Atualizar')
                    .addClass('botao-redirecionar')
                    .attr('href', 'atualizar_chamado.php?cod=' + value.cod_chamado)
                    .attr('target', '_blank');
                    var linha = $('<tr>').append($('<td>').text(value.data_hora_executar),
                       $('<td>').text(value.setor_solicitante),
                       $('<td>').text(value.nome_solicitante),
                       $('<td>').text(value.status_chamado),
                       $('<td>').append(botao));
                    $('#tabela').append(linha);

                });
            }
        });
    }



// atualizar a tabela a cada 5 segundos
    setInterval(atualizarTabela, 1000);

</script>
</head>
<body>
    <a href="admin.php" class="home-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16" style="transform: scale(1.4); color: white;">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
        </svg>
    </a>
    <main class="container">
        <div align="center">
            <img src="img/logo-campo-limpo-paulista.png" class="logo">
        </div>
        <h1>Chamados pendentes</h1>
        <a href="imprime_relatorio_pendente.php" class="print">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
              <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
              <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            </svg>
        </a>
        <div class="table-responsive">
        <table >
            <thead>
                <tr>
                    <th>Data/Hora de Execução</th>
                    <th>Setor Solicitante</th>
                    <th>Nome do Solicitante</th>
                    <th>Status do Chamado</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="tabela">
            <tr>
                <td id="data_hora_executar"></td>
                <td id="setor_solicitante"></td>
                <td id="nome_solicitante"></td>
                <td id="status_chamado"></td>
            </tr>
        </tbody>
        </table>
    </div>
    </main>


</body>
</html>