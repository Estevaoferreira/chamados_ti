<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "chamados";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
$cod_chamado = $_GET['cod'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chamados em andamento</title>
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
        select {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
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
        h1{
            color: white;
        }
    </style>
</head>
<body>
    <main class="container">
        <div align="center">
            <img src="img/logo-campo-limpo-paulista.png" class="logo">
        </div>
        <h1>Atualização de chamado</h1>
        <?php
        if (mysqli_connect_errno()) {
          die('Erro ao conectar com o banco de dados: ' . mysqli_connect_error());
      }
// realizar a consulta ao banco de dados
      $query = "SELECT * FROM chamado WHERE cod_chamado = ".$cod_chamado;
      $resultado = mysqli_query($conexao, $query);

// verificar se houve erro na consulta
      if (!$resultado) {
          die('Erro ao consultar o banco de dados: ' . mysqli_error($conexao));
      }
      while ($linha = $resultado->fetch_object()) 
      {
          ?>
          <form method="POST" action="update_tabela.php?cod=<?php echo $cod_chamado;?>">

            <label for="desc_chamado">Descrição do chamado</label>
            <textarea id="desc_chamado" name="desc_chamado"><?php echo $linha->desc_chamado ?></textarea>

            <label for="data_hora_executar">Data/hora para e execução:</label>
            <input type="text" id="data_hora_executar" name="data_hora_executar" value="<?php echo $linha->data_hora_executar; ?>">

            <label for="data_hora_limite">Data/hora prazo máximo:</label>
            <input type="text" id="data_hora_limite" name="data_hora_limite" value="<?php echo $linha->data_hora_limite ?>">

            <label for="setor_solicitante">Setor solicitante:</label>
            <input type="text" id="setor_solicitante" name="setor_solicitante" value="<?php echo $linha->setor_solicitante; ?>">

            <label for="nome_solicitante">Nome solicitante:</label>
            <input type="text" id="nome_solicitante" name="nome_solicitante" value="<?php echo $linha->nome_solicitante; ?>">

            <label for="nome_tecnico">Nome do(s) técnico(s):</label>
            <input type="text" id="nome_tecnico" name="nome_tecnico" placeholder="...">

            <label for="desc_tecnica_chamado">Descrição técnica do chamado: </label>
            <textarea id="desc_tecnica_chamado" name="desc_tecnica_chamado" placeholder="Sua interpretação técnica do chamado.."></textarea>

            <label for="resolucao">Como foi resolvido o chamado: </label>
            <textarea id="resolucao" name="resolucao" placeholder="O que foi feito para se resolver o chamado..."></textarea>

            <label for="nivel_dificuldade">Escolha uma opção:</label>
            <select id="nivel_dificuldade" name="nivel_dificuldade">
              <option value="mf">Muito fácil</option>
              <option value="f">Fácil</option>
              <option value="r">Regular</option>
              <option value="d">Difícil</option>
              <option value="md">Muito difícil</option>
          </select>
          <label for="status_chamado">Status do chamado:</label>
          <select id="status_chamado" name="status_chamado" required>
            <option value="" disabled selected>SELECIONE UMA OPÇÃO</option>
            <option value="CONCLUIDO">CONCLUÍDO</option>
            <option value="EM ANDAMENTO">EM ANDAMENTO</option>
            <option value="PENDENTE">PENDENTE</option>
            <option value="PENDENTE DE TERCEIROS">PENDENTE DE TERCEIROS</option>
        </select>

        <p>
            <input class="w-100 btn btn-lg btn-primary" type="submit" name="acao" value="Alterar" >
            <a class="w-100 btn btn-lg btn-primary" href="dashboard.php">Cancelar</a>
        </p>
    </form>
    <?php    
}
?>
</main>


</body>
</html>