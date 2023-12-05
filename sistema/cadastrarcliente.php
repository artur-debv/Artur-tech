<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
  if($_POST)
  {
	 include_once('conexao.php');
	 $primeiro = $_POST['primeiro'];
	 $ultimo = $_POST['ultimo_nome'];
	 $email = $_POST['email'];
	 $senha = md5($_POST['senha']); 
	 $sql = "insert into cliente(primeiro_nome, ultimo_nome, email, senha)
	         values ('$primeiro','$ultimo', '$email','$senha')";
	 if($result = $conexao -> query($sql))
	 {
	    echo '<div class="alert alert-success">
			  <strong>Sucesso!</strong> Registro Inserido com Sucesso.
			</div>'; 
		//header("refresh: 3; url=selecao.php");
		//header("location: selecao.php");
	 }
	 else
	   echo '<div class="alert alert-danger">
			  <strong>Erro!</strong> Erro ao Inserir Registro. <br>'.$conexao->error.'
			<br>'.$sql.'</div>';
  }
   header("location:login.php")
  ?>
</body>

</html>