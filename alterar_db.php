<?php
    //Verifica se o user está logado
    session_start();
    if (!isset($_SESSION['login_usuario'])) {
          header("Location: index.php");
       }
    
    //Recebe os dados do form e armazena em variaveis
    $id=$_GET['id'];
    $nome_novo=$_POST['nome_novo'];
    $tel_novo=$_POST['tel_novo'];
    $email_novo=$_POST['email_novo'];
    $ende_novo=$_POST['ende_novo'];
    $cep_novo=$_POST['cep_novo'];
    $cpf_novo=$_POST['cpf_novo'];

    //Conexão e alteração dos dados no banco
    $conexao = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conexao, "clientes");
    $sql = "UPDATE clientes SET nome='$nome_novo'
    ,tel='$tel_novo',email='$email_novo',ende='$ende_novo',cep='$cep_novo'
    ,cpf='$cpf_novo' WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sql)
    or die ("Não foi possível realizar a consulta ao banco de dados");

    //Confirmação do resultado
    echo "<h1>Notícia alterada com sucesso!</h1>";
    echo "<a href='controle.php'> Voltar para o Painel de controle </a>";

      ?>