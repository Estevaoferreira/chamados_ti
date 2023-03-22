<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="img/icones/todos/favicon.ico">
	<link rel="stylesheet" type="text/css" href="estilos/style.css">
	<link href="estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			font-family: 'Roboto', sans-serif;
		}
		h1{
			color: white;
		}
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 20px;
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
	</style>
	<script>
		function atualizarTabela() {
  // enviar uma solicitação AJAX para o servidor PHP
			$.ajax({
				url: 'atualizar_tabela.php',
				dataType: 'json',
				success: function(dados) {
      // atualizar a tabela HTML com os dados recebidos
					$('#tabela').html('');
					$.each(dados, function(index, value) {

						$('#tabela').append('<tr><td>' + value.data_hora_executar + '</td><td>' + value.setor_solicitante + '</td><td>' + value.nome_solicitante + '</td><td>' + value.status_chamado + '</td></tr>');
						if (value.status_chamado.toLowerCase() === 'concluido') {
							setTimeout(function() {
								window.location.href = 'home.php';
							}, 3000)
						}
					});
				}
			});
		}

// atualizar a tabela a cada 5 segundos
		setInterval(atualizarTabela, 1000);

	</script>
</head>
<body>
	<main class="container">
		<div align="center">
			<img src="img/logo-campo-limpo-paulista.png" class="logo">
		</div>
		<h1>Último Chamado</h1>
		<table>
			<thead>
				<tr>
					<th>Data/Hora de envio</th>
					<th>Setor solicitante</th>
					<th>Nome solicitante</th>
					<th>Andamento do chamado</th>
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
	</main>


</body>
</html>