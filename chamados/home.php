<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/icones/todos/favicon.ico">
	<link rel="stylesheet" type="text/css" href="estilos/style.css">
	<link href="estilos/bootstrap-exemplos/assets/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		form {
			max-width: 600px;
			margin: auto;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0 0 10px #ccc;
		}

		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}

		input[type="text"], textarea {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		input[type="datetime-local"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #258DCA;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
		}

		input[type="submit"]:hover {
			background-color: #258DCA;
		}
	</style>
</head> 
<body>
	<main class="container">
		<div align="center">
			<img src="img/logo-campo-limpo-paulista.png" class="logo">
		</div>
		<div>
			<form action="abertura_chamado.php" method="POST">
				<label for="desc_chamado">Descrição do Chamado:</label>
				<textarea id="desc_chamado" name="desc_chamado" required></textarea>

				<label for="data_hora_executar">Data/Hora para Executar:</label>
				<input type="datetime-local" id="data_hora_executar" name="data_hora_executar" required>

				<label for="data_hora_limite">Prazo Máximo de Execução:</label>
				<input type="datetime-local" id="data_hora_limite" name="data_hora_limite" required>

				<label for="setor_solicitante">Setor Solicitante:</label>
				<input type="text" id="setor_solicitante" name="setor_solicitante" required>

				<label for="nome_solicitante">Nome do Solicitante:</label>
				<input type="text" id="nome_solicitante" name="nome_solicitante" required>

				<input type="submit" value="Enviar">
			</form>
		</div>
	</main>
</body>
</html>