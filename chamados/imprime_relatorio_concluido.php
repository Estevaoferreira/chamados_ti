<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	}

	th, td {
		padding: 10px;
	}

</style>
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
			background-color: #71D0F7;
			font-family: 'Roboto', sans-serif;
		}
		h1{
			color: white;
		}
		a{
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 20px;
			/*background-color: #00A82A;
			border-color: #00A82A;*/
		}
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}

		th, td {
			padding: 10px;
		}

	</style>
</head>

<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "chamados";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
	die('Erro ao conectar ao banco de dados: ' . $conn->connect_error);
}


$sql = "SELECT * FROM chamado WHERE status_chamado = 'CONCLUIDO'  ORDER BY data_hora_executar";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir cabeçalho da tabela
	echo "<table><tr><th>Efetuar até</th><th>Setor</th><th>Usuário</th><th>Detalhes do chamado</th><th>Status do chamado</th></tr>";
    // Iterar sobre os resultados
	while($row = $result->fetch_assoc()) {
        // Imprimir cada tupla
		echo "<tr><td>".$row["data_hora_limite"]."</td><td>".$row["setor_solicitante"]."</td><td>".$row["nome_solicitante"]."</td><td>".$row["desc_tecnica_chamado"]."</td><td>".$row["status_chamado"]."</td></tr>";
	}
    // Fechar a tabela
	echo "</table>";
} else {
	echo "0 resultados";
}

echo "<button onclick='window.print()'>Imprimir</button><br>";
echo "<br><button><a href='chamado_concluido.php'>Voltar</a></button>";

?>