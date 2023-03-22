<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador</title>
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
        .container a{
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            background-color: #00A82A;
            border-color: #00A82A;
        }
    </style>
</head>
<body>
    <main class="container">
        <div align="center">
            <img src="img/logo-campo-limpo-paulista.png" class="logo">
        </div>
        <h1>Chamados</h1>
        <a href="chamado_em_andamento.php" class="btn btn-primary btn-transition">EM ANDAMENTO</a>
        <a href="chamado_pendente.php" class="btn btn-primary btn-transition">PENDENTES</a>
        <a href="chamado_pendente_terceiros.php" class="btn btn-primary btn-transition">PENDENTES DE TERCEIROS</a>
        <a href="chamado_concluido.php" class="btn btn-primary btn-transition">CONCLUÍDOS</a>
        <br>
        <a href="todo_chamado.php" class="btn btn-primary btn-transition">Todos os chamados</a>
    </main>


</body>
</html>