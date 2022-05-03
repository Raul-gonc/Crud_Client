<?php
      //Verifica se o user está logado
      session_start();
      if ( ! isset($_SESSION['login_usuario'])) {
            header("Location: index.php");
         }
         
      //Conecta e requisita os dados no banco
      $conexao = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($conexao, "clientes");
      $sql = "SELECT * FROM clientes ORDER BY id DESC";
      $resultado = mysqli_query($conexao, $sql)
      or die ("Não foi possível realizar a consulta ao banco de dados");

      ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Asap:ital,wght@1,700&family=Nunito:wght@700&family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/normalize.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>Painel de Controle</title>
</head>
<body>

    <nav>
        <a href="index.php" >ClientCrud</a>
        
        <ul>
            <li style="right: 50px;"><a href='cadastra.php'> Criar nova</a></li>
            <li style="right: 50px;"><a href='logout.php'> Logout </a></li>
        </ul>
    </nav>
    <header id="topo">
        
    </header>

    <section id="corpo">
          <h1>Clientes</h1>
        <?php
        echo "<table width=95% border=0 cellpadding=5 cellspacing=1>";
        echo "<tr>";
        echo "<th width=15>ID:</th>";
        echo "<th width=100>Nome:</th>";
        echo "<th width=100>Telefone::</th>";
        echo "<th width=100>Email:</th>";
        echo "<th width=100>CPF:</th>";
        echo "<th width=50>Alterar</th>";
        echo "<th width=50>Excluir</th>";
        echo "<th width=50>Ver</th>";
        echo "</tr>";
        
        //Armazena os dados do cliente em variaveis
        while ($linha=mysqli_fetch_array($resultado)) {
        $id = $linha["id"];
        $nome = $linha["nome"];
        $tel = $linha["tel"];
        $email = $linha["email"];
        $cpf = $linha["cpf"];

        //imprime os dados
        echo "<tr>";
        echo "<th width=15>$id<br></th>";
        echo "<th width=100>$nome<br></th>";
        echo "<th width=100>$tel<br></th>";
        echo "<th width=100>$email<br></th>";
        echo "<th width=100>$email<br></th>";
        echo "<th width=50><a href='alterar.php?id=$id'>Alterar</a><br></th>";
        echo "<th width=50><a href='excluir.php?id=$id'>Excluir</a><br></th>";
        echo "<th width=50><a href='cliente.php?id=$id'>Ver</a><br></th>";
        echo "</tr>";
        echo "<br>";
        
        }
        echo "</table>";
        ?>
    </section>

    </body>
    </html>
