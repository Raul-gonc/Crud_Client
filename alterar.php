<?php
      //Verifica se o user está logado
      session_start();
      if (!isset($_SESSION['login_usuario'])) {
            header("Location: index.php");
         }

      //recebe o id do cliente
      $id=$_GET['id'];
      
      //Conexão e requisição no banco de dados
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
    <title>Editar Cliente</title>
</head>

<body>
    <nav>
        <a href="index.php" >ClientCrud</a>
    </nav>

    <?php
    
    //armazena os dados em variaveis
    while ($linha=mysqli_fetch_array($resultado)) {
      $id = $linha["id"];
      $nome = $linha["nome"];
      $tel = $linha["tel"];
      $email = $linha["email"];
      $ende = $linha["ende"];
      $cep = $linha["cep"];
      $cpf = $linha["cpf"];

      //form de atualização dos dados
      echo "<h1>Editar Cliente:</h1>";
      echo "<hr><br>";
      echo "<form action='alterar_db.php?id=$id' method='post'>";
      echo "Nome:</br><input name='nome_novo' type='text' value='$nome' size=30> *<br>";
      echo "Telefone:</br><input name='tel_novo' type='text' value='$tel' size=30> *<br>";
      echo "Email:</br><input name='email_novo' type='text'
      value='$email' size=30><br><br>";
      echo "Endereço:</br><input name='ende_novo' type='text' value='$ende' size=30> *<br>";
      echo "cep:</br><input name='cep_novo' type='text' value='$cep' size=30> *<br>";
      echo "cpf:</br><input name='cpf_novo' type='text' value='$cpf' size=30> *<br>";
      echo "<button type='submit' name='salvar' value=<a href='alterar_db.php?id=$id'>Salvar</button>";
      echo "</form>";
      echo "<br><hr>";
      }
    
    ?>

    

</body>


</html>