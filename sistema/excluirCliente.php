<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir cliente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/5.3.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <?php
    include_once('conexao.php');
    
    $id = $_GET['id'];
    
    $sql = "SELECT primeiro_nome from cliente 
            where cliente_id=$id";

    $result = $conexao -> query($sql);
    $row = $result -> fetch_assoc();
    echo "<br><br>";
    echo    '<div class="alert alert-warning text-center">
    <strong>Cuidado</strong> <p>Deseja excluir o registro  <strong>' .$row['primeiro_nome'].' </strong> realmente ?
             </div>';
             echo '<center>';
             echo '<a href=?id='.$id.'&resp=S><button type="button" class="btn btn-primary">sim</button></a>';
	echo '<a href="selecao.php"><button type="button" class="btn btn-danger">Não</button>&nbsp;</a>';
    if(isset($_GET['resp']))
    {
      $sql2 = "delete from cliente
      where cliente_id = ".$_GET['id'];
      if($result = $conexao -> query($sql2)){
        echo '<br><br><h4>registro excluido</h4>';
       
      }else{
        echo 'erro ao excluir';
      }
    }
    ?>
    </div>
</body>
</html>