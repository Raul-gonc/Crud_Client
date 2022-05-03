
      <?php

      //Verifica se o user está logado
      session_start();
      if (!isset($_SESSION['login_usuario'])) {
      header("Location: index.php");
       }

      //Armazena os dados do form em variaveis
      $nome=$_POST['nome'];
      $tel=$_POST['tel'];
      $email=$_POST['email'];
      $ende=$_POST['ende'];
      $cep=$_POST['cep'];
      $cpf=$_POST['cpf'];
      
      //monta o sql com os dados
      $sql = "INSERT INTO clientes (nome, tel, email, ende, cep,
      cpf) VALUES ('$nome', '$tel', 
      '$email', '$ende', '$cep', '$cpf')";

      //conecta ao banco
      $conexao = mysqli_connect("localhost", "root", "")
      or die ("Configuração de Banco de Dados Errada!");
      
      //seleciona e grava os daodos no banco
      $db = mysqli_select_db($conexao, "clientes")
      or die ("Banco de Dados Inexistente!");
      $sql = mysqli_query($conexao, $sql)
      or die ("Houve erro na gravação dos dados, por favor, clique em voltar e verifique os campos obrigatórios!");

      echo "<h1>Cadastro efetuado com sucesso!</h1>";
      echo "<a href='controle.php'> Voltar para o Painel de controle </a>";

      ?>