<?php
/*set_time_limit(60); // aumenta o tempo limite de execução para 300 segundos (5 minutos)
while (true) {*/
// Conexão com o banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "chamados";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// verificar se houve erro de conexão
if (mysqli_connect_errno()) {
  die('Erro ao conectar com o banco de dados: ' . mysqli_connect_error());
}
// realizar a consulta ao banco de dados
$query = "SELECT cod_chamado, data_hora_executar, setor_solicitante, nome_solicitante, status_chamado FROM chamado WHERE status_chamado = 'CONCLUIDO'  ORDER BY data_hora_executar";
$resultado = mysqli_query($conexao, $query);

// verificar se houve erro na consulta
if (!$resultado) {
  die('Erro ao consultar o banco de dados: ' . mysqli_error($conexao));
}

// formatar os dados em um array
$dados = array();
while ($linha = mysqli_fetch_assoc($resultado)) {
  $dados[] = $linha;
}

// retornar os dados como um JSON
header('Content-Type: application/json');
echo json_encode($dados);

// fechar a conexão com o banco de dados
mysqli_close($conexao);
/*sleep(10);
}*/
?>
