<?php
      //Verifica se o user está logado
      session_start();
      if (!isset($_SESSION['login_usuario'])) {
      header("Location: index.php");
       }
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
    <title>Nova Cliente</title>
</head>

<body>
    <nav>
        <a href="index.php" >ClientCrud</a>
    </nav>

    <h1>Sistema de Cadastro de Clientes</h1>
    <hr><br>
    <form action='inserir.php' method='post'>
        Nome:</br><input name='nome' type='text' size=30> *<br>
        Telefone: </br><input name='tel' type='tel' size=30><br><br>
        Email: </br><input name='email' type='text' size=30><br><br>
        End: </br><input name='ende' type='text' size=30><br><br>
        Cep: </br><input name='cep' type='text' size=30><br><br>
        CPF: </br><input name='cpf' type='text' size=30><br><br>
        <input type='submit' value='Cadastrar'>
    </form>
    <br><hr>

</body>


</html>