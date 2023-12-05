<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alterar nome</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <?php
    $id = $_GET['id'];
    if(!(isset($_GET['id'])))
     header("location:selecao.php");

     include_once('conexao.php');


    $sql = "SELECT cliente_id,primeiro_nome,ultimo_nome,email,senha
    
    FROM cliente where cliente_id=$id";

    if($result = $conexao -> query($sql)){
        $row = $result -> fetch_assoc();
        $primeiroNome = $row['primeiro_nome'];
        $UltimoNome = $row['ultimo_nome'];
        $email = $row['email'];
        $id = $row['cliente_id'];
    }
?>
    <style>
        h2{
            text-align:center;
        }
    </style>
    <h2 class="h2">Alterar PHP</h2>

<form class="form-horizontal" action="#" method="post">
   <input type="hidden"  value="<?php echo $id;?>" name="id">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Primeiro Nome:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Enter primeiro nome" name="primeiroNome" value="<?php echo $primeiroNome;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Último  Nome:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Enter Último nome" name="UltimoNome" value="<?php echo $UltimoNome;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">E-mail</label>
    <div class="col-sm-10">
      <input type="te" class="form-control"  placeholder="Enter E-mail" name="email" value="<?php echo $email;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Senha</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  placeholder="Enter Senha" name="senha">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
      <a href="sistema/painelAdm.php?pag=Cliente"><button type="button" class="btn btn-default">Voltar</button></a>
    </div>
  </div>
 <?php
  if($_POST){
        $nome = $_POST['primeiroNome'];
        $ultimo = $_POST['UltimoNome'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $sql = "UPDATE cliente 
         set primeiro_nome='$nome',ultimo_nome='$UltimoNome',email='$email'
         WHERE cliente_id= $id";
        if($result = $conexao -> query($sql)){
            echo '<br><div class="alert alert-success">
            <strong>sucesso!</strong> registro atualizado
            </div>';
            header('refresh:3;url=painelAdm.php?pag=Cliente');
        }else{
            echo '<br>Erro do Banco de Dados. '.$sql.'<br>'.$conexao->error;
        }
    }
	$conexao->close();
    ?>
</form>
    </div>
</body>
</html>