<?php
// Conexão com o banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "chamados";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
	die("Falha na conexão: " . mysqli_connect_error());
}

// Recebe os dados enviados pelo formulário
$desc_chamado = $_POST["desc_chamado"];
$data_hora_executar = $_POST["data_hora_executar"];
$data_hora_limite = $_POST["data_hora_limite"];
$setor_solicitante = $_POST["setor_solicitante"];
$nome_solicitante = $_POST["nome_solicitante"];

// Prepara a consulta SQL para inserir os dados na tabela chamado
$sql = "INSERT INTO chamado (desc_chamado, data_hora_executar, data_hora_limite, setor_solicitante, nome_solicitante) VALUES ('$desc_chamado', '$data_hora_executar', '$data_hora_limite', '$setor_solicitante', '$nome_solicitante')";

// Executa a consulta SQL e verifica se a inserção foi bem-sucedida
// Verifica se a inserção foi bem-sucedida e inicia a sessão com o nome do setor inserido por último
if (mysqli_query($conn, $sql)) {
	echo "Chamado criado com sucesso!";
	session_start();
	$_SESSION['setor'] = $setor_solicitante;
	header("Location: chamado.php");
} else {
	echo "Erro ao criar chamado: " . mysqli_error($conn);
}


// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
