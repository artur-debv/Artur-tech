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
     header("location:selecaoProduto.php");

     include_once('conexao.php');


    $sql = "SELECT produto_id,primeiro_nome
    
    FROM produto where produto_id=$id";

    if($result = $conexao -> query($sql)){
        $row = $result -> fetch_assoc();
        $primeiro_nome = $row['primeiro_nome'];
    }
?>
    <style>
        h2{
            text-align:center;
        }
    </style>
    <h2 class="h2">Alterar PHP</h2>

<form class="form-horizontal" action="" method="post">
   <input type="hidden"  value="<?php echo $id;?>" name="id">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Primeiro Nome:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Enter primeiro nome" name="primeiro_nome" value="<?php echo $primeiro_nome;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Enviar</button>
    </div>
  </div>
</form>
    <?php
    if($_POST){
        $primeiro_nome = $_POST['primeiro_nome'];
        $id = $_POST['id'];
        $sql = "UPDATE produto
         set primeiro_nome='$primeiro_nome'
         WHERE produto_id= $id";
        if($result = $conexao -> query($sql)){
            echo '<br><div class="alert alert-success">
            <center><strong>sucesso!</strong> registro atualizado</center>
            </div>';
           header('refresh:3;url=painelAdm.php?pag=Produto');
        }else{
            echo '<br>Erro do Banco de Dados. '.$sql.'<br>'.$conexao->error;
        }
    }
	$conexao->close();
    ?>
    </div>
</body>
</html>