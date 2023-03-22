<?php
// Conexão com o banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "chamados";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

$cod_chamado			= $_GET['cod'];
$desc_chamado 			= $_POST['desc_chamado'];
$data_hora_executar 	= $_POST['data_hora_executar'];
$data_hora_limite		= $_POST['data_hora_limite'];
$setor_solicitante		= $_POST['setor_solicitante'];
$nome_solicitante		= $_POST['nome_solicitante'];
$nome_tecnico			= $_POST['nome_tecnico'];
$desc_tecnica_chamado	= $_POST['desc_tecnica_chamado'];
$resolucao				= $_POST['resolucao'];
$nivel_dificuldade		= $_POST['nivel_dificuldade'];
$status_chamado			= $_POST['status_chamado'];

/*echo $desc_chamado,
$data_hora_executar, 
$data_hora_limite,
$setor_solicitante,
$nome_solicitante,
$nome_tecnico,
$desc_tecnica_chamado,
$resolucao,
$nivel_dificuldade,
$status_chamado
;*/


// verificar se houve erro de conexão
if (mysqli_connect_errno()) {
	die('Erro ao conectar com o banco de dados: ' . mysqli_connect_error());
}
// realizar a consulta ao banco de dados
$query = "UPDATE chamado SET 
        desc_chamado = '$desc_chamado',
        data_hora_executar = '$data_hora_executar',
        data_hora_limite = '$data_hora_limite',
        setor_solicitante = '$setor_solicitante',
        nome_solicitante = '$nome_solicitante',
        nome_tecnico = '$nome_tecnico',
        desc_tecnica_chamado = '$desc_tecnica_chamado',
        resolucao = '$resolucao',
        nivel_dificuldade = '$nivel_dificuldade',
        status_chamado = '$status_chamado'
        WHERE cod_chamado = '$cod_chamado'";
$resultado = mysqli_query($conexao, $query);

// verificar se houve erro na consulta
if (!$resultado) {
	die('Erro ao consultar o banco de dados: ' . mysqli_error($conexao));
}

// fechar a conexão com o banco de dados
mysqli_close($conexao);
switch ($status_chamado) {
	case 'CONCLUIDO':
		header("Location: chamado_concluido.php");
		break;

	case 'EM ANDAMENTO':
		header("Location: chamado_em_andamento.php");
		break;

	case 'PENDENTE':
		header("Location: chamado_pendente.php");
		break;

	case 'PENDENTE DE TERCEIROS':
		header("Location: chamado_pendente_terceiros.php");
		break;
}

?>
