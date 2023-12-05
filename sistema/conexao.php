<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    
    $servername = "mysql.25dejulho.info";
    $username = "25dejulho01";
    $password = "aula2023";
    $schema = "25dejulho01";

    $conexao = new mysqli($servername,$username,$password,$schema);

    if($conexao->connect_error){
        die("falha na conexao".$conexao->connect_error);
    }else{
        //echo "conexao efetuada com sucesso.";//
    }
    ?>

</body>
</html>