<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/imagens para uso do favicon/computer.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/styles.css">
  <title>Computadores</title>
</head>

<body>
  <style>
    div.dataTables_wrapper div.dataTables_filter label {
      font-weight: normal;
      white-space: nowrap;
      text-align: left;
    }

    label {
      display: inline-block;
      margin-bottom: 0.5rem;
    }


    label {
      font-weight: bold;
      font-size: 13px;
      color: #262626;
    }

    .form-control-sm {
      height: calc(1.5em + 0.5rem + 2px);
      padding: 0.25rem 0.5rem;
      font-size: .875rem;
      line-height: 1.5;
      border-radius: 0.2rem;
    }

    .form-control {
      display: block;
      width: 100%;
      height: calc(1.5em + 0.75rem + 2px);
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #6e707e;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #d1d3e2;
      border-radius: 0.35rem;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    [type=search] {
      outline-offset: -2px;
      -webkit-appearance: none;
    }

    .div_search_input {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .content {
      display: flex;
      justify-content: center;
    }

    .img {
      height: 135px;
      width: 149px;
      position: relative;
      margin-top: 20px;
    }

    .button {
      background-color: black;
      color: white;
      border: none;
      height: 38px;
      width: 181px;
      cursor: pointer;
    }

    #dataTable_filter {
      padding-top: 20px;
      padding-left: 70%;
    }

    .links {
      background-color: black;
      height: 36px;
      width: 190px;
      border: none;
      position: absolute;
      justify-content: center;
      display: flex;
      align-items: center;
    }
  </style>
  <div class="container" id="nav">
    <nav>
      <div id="title">
        <h1><a id="li_1" href="#">Artur tech</a></h1>
      </div>
      <nav class="sc-hAZoDl cqDFSz">
        <div><a href="inicio.php"><img
              src="img/icons a ser usadas na navbar/explorar.png" alt="Shop">Home</a></div>s
        </div>
      </nav>
    </nav>
  </div>
  <form action="" method="get">
    <div class="col-sm-12 col-md-6">
      <div id="dataTable_filter" class="dataTables_filter"><label>Buscar:<input type="search"
            class="form-control form-control-sm" placeholder="" aria-controls="dataTable" name="produto"></label></div>
    </div>
  </form>
  <?php
  include_once('conexao.php');

  $sql = "SELECT * FROM produto WHERE categoria = 'computador'";
  $result = $conexao->query($sql);

  if ($result) {
    if ($result->num_rows > 0) {
      echo '<div class="content">'; // Abre a div pai
      while ($row = $result->fetch_assoc()) {
        echo '<div class="computador">'; // Abre a div filha para cada produto
        echo '<primeiro_nome style="text-align: center;">';
        echo $row["primeiro_nome"] . "<br>";
        echo '<td><img class="img" src="sistema/img/' . $row['imagem'] . '"  height: 181px;
        ></td>';
        echo "<br>";
        echo "<br>";
        echo "Sobre este item: " . $row["descricao"] . "<br>";
        echo "<br>";
        echo "Preço do produto: " . $row["preco"] . "<br>";
        echo "<br>";
        echo '<a class="links" href="sistema/carrinho.php?acao=add&id='.$row['produto_id'].'">Adicionar ao carrinho</a>';	
        echo "</div>"; // Fecha a div filha para cada produto
      }
      echo '</div>'; // Fecha a div pai
    } else {
      echo "<center>Nenhum produto encontrado na categoria 'Monitor</center>'.";
    }
  }
  ?>
  <?php
  include_once("conexao.php");

  $produto_buscado = '';

  if (isset($_GET['produto'])) {
    $produto_buscado = $_GET['produto'];
  }

  if (empty($produto_buscado)) {
    echo "<center>Digite um produto para pesquisar</center>";
  } else {
    $sql = "SELECT * FROM produto where primeiro_nome like '%$produto_buscado%' AND categoria = 'computador' order by rand()";

    $result = $conexao->query($sql);

    echo '<tr>';
    while ($row = $result->fetch_assoc()) {
      echo '<td align="center">';
      echo '<td align="center">';
      echo '<h3><center><font color="#000099">' . $row['primeiro_nome'] . '</font></h3><br></center>';
      echo '<center><img src="sistema/img/' . $row['imagem'] . '" width="100px" height="100px" /></center>';
      echo '<center><h3><font color="#000099">' . $row['descricao'] . '</font></h3></center>';
      echo '<center><br>Preço : R$ ' . number_format($row['preco'], 2, ',', '.');
    }
  }
  ?>
  <section class="sc-cxabCf cEZwIm2">
    <div class="sc-llJcti fSiFFA">
      <div class="sc-iIPllB buhlSA">
        <div>
          <h4 class="h4_nome">Artur Tech</h4>
        </div>
        <a href="mailto:ColdTech@gamil.com">ArturTech@gmail.com</a>
        <a>+55 85 99999 9999</a>
        <div class="sc-ezWOiH iPCesR">
          <img src="img/imagens usada para o footer/fecebook.png" alt="Conta ColdTech facebook"><img
            src="img/imagens usada para o footer/instagram1.png" alt="Conta ColdTech instagram"><img
            src="img/imagens usada para o footer/twiter1.png" alt="Conta ColdTech twitter">
        </div>
      </div>
      <div class="sc-gicCDI DupHf">
        <h4>Atendimento ao cliente</h4><a href="/contact">Ajuda &amp; Contanto</a><a href="/explorar">Loja online</a><a
          href="/">Home</a>
      </div>
    </div>
    <p class="sc-bZkfAO fJFxfH">Copyright 2022. all rights reserved </p>
  </section>
</body>

</html>