<?php
      //Verifica se o user está logado
      session_start();
      if (!isset($_SESSION['login_usuario'])) {
            header("Location: index.php");
         }

      //Recebe id do cliente
      $id=$_GET['id'];

      //Conecta e requisita os dados no banco
      $conexao = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($conexao, "clientes");
      $sql = "SELECT * FROM clientes WHERE id='$id'";
      $resultado = mysqli_query($conexao, $sql)
      or die ("Não foi possível realizar a consulta ao banco de dados");

      ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charser="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@1,700&family=Nunito:wght@700&family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/normalize.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Dados do Cliente</title>
</head>

<body>
    <nav>
        <a href="index.php" >Voltar</a>
    </nav>

    <?php
    //Armazena os dados do cliente em variaveis
    $linha=mysqli_fetch_array($resultado);
      $id = $linha["id"];
      $nome = $linha["nome"];
      $tel = $linha["tel"];
      $email = $linha["email"];
      $ende = $linha["ende"];
      $cep = $linha["cep"];
      $cpf = $linha["cpf"];
      
    //imprime os dados
    echo "<h1>Cliente $id</h1>";
    echo "<h2>Nome: $nome</h2>";
    echo "<h2>Telefone: $tel</h2>";
    echo "<h2>Email: $email</h2>";
    echo "<h2>Endereço: $ende - $cep</h2>";
    echo "<h2>CPF: $cpf</h2>";
    ?>

</body>

</html>