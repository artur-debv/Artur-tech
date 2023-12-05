<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>
<?php
if ($_POST) {
  include_once('conexao.php');
  /* Insira aqui a pasta que deseja salvar o arquivo. Ex: imagens */
  $uploaddir = 'img';
  if (!file_exists($uploaddir))
    mkdir($uploaddir);
  $uploaddir = 'img/';
  $nome = $_POST['nome'];
  $valor = str_replace(",", ".", $_POST['valor']);
  $image = $_FILES['arquivo']['name'];
  //$uploadfile = img/cachorro.jpg
  $uploadfile = $uploaddir . $_FILES['arquivo']['name'];
  if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
    $descri = $_POST['descricao'];
    $cat = $_POST['categoria'];
    $sql = "INSERT INTO produto (primeiro_nome, preco, imagem, descricao, categoria )
          VALUES ('$nome', '$valor', '$image','$descri','$cat')";
    $conexao->query($sql);
  }
}
?>
<style>
  .btn-primary {
    position: absolute;
    left: 30%;
    top: 13%;
  }

  button {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    border: none;
    display: block;
    margin: 0 auto;
    border-radius: 10px;
    height: 37px;
    font-size: 20px;
    margin-bottom: 20px;
  }

  .form-group {
    margin-bottom: 20px;
    margin-top: 20px;
    padding-left: 6%;
  }

  .form-control {
    display: block;
    width: 442px;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: var(--bs-body-color);
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: var(--bs-body-bg);
    background-clip: padding-box;
    border: var(--bs-border-width) solid var(--bs-border-color);
    border-radius: var(--bs-border-radius);
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
  }

  .modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    color: var(--bs-modal-color);
    pointer-events: auto;
    background-color: var(--bs-modal-bg);
    background-clip: padding-box;
    border: var(--bs-modal-border-width) solid var(--bs-modal-border-color);
    border-radius: var(--bs-modal-border-radius);
    outline: 0;
    height: 521px;
  }



  .table {
    --bs-table-color-type: initial;
    --bs-table-bg-type: initial;
    --bs-table-color-state: initial;
    --bs-table-bg-state: initial;
    --bs-table-color: var(--bs-emphasis-color);
    --bs-table-bg: var(--bs-body-bg);
    --bs-table-border-color: var(--bs-border-color);
    --bs-table-accent-bg: transparent;
    --bs-table-striped-color: var(--bs-emphasis-color);
    --bs-table-striped-bg: rgba(var(--bs-emphasis-color-rgb), 0.05);
    --bs-table-active-color: var(--bs-emphasis-color);
    --bs-table-active-bg: rgba(var(--bs-emphasis-color-rgb), 0.1);
    --bs-table-hover-color: var(--bs-emphasis-color);
    --bs-table-hover-bg: rgba(var(--bs-emphasis-color-rgb), 0.075);
    width: 70%;
    margin-bottom: 1rem;
    vertical-align: top;
    border-color: var(--bs-table-border-color);
    position: absolute;
    left: 27%;
    margin-top: 40px;
  }

  h2 {
    position: absolute;
    left: 39%;
  }

  .div_container {
    background-color: black;
    height: 55px;
  }

  .topbar .nav-item .nav-link .img-profile {
    height: 2rem;
    width: 2rem;
   
  }

  .topbar {
    height: 4.375rem;
    display: flex;
    justify-content: center;
    padding-left: 990px;
  }

  .topbar.navbar-light .navbar-nav .nav-item .nav-link {
    color: #d1d3e2;
    position: relative;
    margin-top: -37px;
    right: 11%;
    
  }

  .topbar .nav-item .nav-link {
    height: 4.375rem;
    display: flex;
    align-items: center;
    padding: 0 0.75rem;
    display: flex;
    justify-content: center;
  }
</style>

<body>
  <div>
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false"><img class="img-profile rounded-circle"
                src="../img/imagens usadas no nav do painel adm/IconUser.jpg"></a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
             
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                Sair
              </a>
            </div>
        </li>
      </ul>
    </nav>
  </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Cadastrar Produto
    </button>
    <?php
    include_once('conexao.php');

    if ($_POST) {
      $a = $_POST['nome'];
      $b = $_POST['categoria'];
      $c = $_POST['descricao'];
    } else {
      $a = '';
      $b = '';
      $c = '';
    }

    // Define o número de resultados por página
    $results_per_page = 10;

    // Obtenha o número da página atual
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
      $page = intval($_GET['page']);
    } else {
      $page = 1;
    }

    // Calcule o deslocamento (offset) para a consulta SQL
    $offset = ($page - 1) * $results_per_page;

    $sql = "SELECT Produto_id, primeiro_nome, categoria, Imagem, descricao
        FROM produto
        WHERE primeiro_nome LIKE '%$a%' AND categoria LIKE '%$b%'
        ORDER BY primeiro_nome
        LIMIT $results_per_page OFFSET $offset";

    $result = $conexao->query($sql);

    if ($result) {
      // Carrega o painelAdm.php novamente, mesmo se ele já estiver incluído na memória do navegador
      include_once('painelAdm.php');

      echo '<p>';
      echo '<form action="#" method="post">';
      echo '</form>';
      echo '<p><br />';
      echo '<p>';
      echo '<table class="table table-striped">';
      echo '<tr>';
      echo '<th>Produto ID</th>';
      echo '<th>Primeiro nome</th>';
      echo '<th>Categoria</th>';
      echo '<th>Descrição</th>';
      echo '<th>Imagem</th>';
      echo '<th>Alterar</th>';
      echo '<th>Excluir</th>';
      echo '</tr>';

      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['Produto_id'] . '</td>';
        echo '<td>' . $row['primeiro_nome'] . '</td>';
        echo '<td>' . $row['categoria'] . '</td>';
        echo '<td>' . $row['descricao'] . '</td>';
        echo '<td><img src="img/' . $row['Imagem'] . '" width=80px height=80px></td>';
        echo '<td><a   href="AlterarProduto.php?id=' . $row['Produto_id'] . '"><button type="button" class="btn btn-success">Alterar</button></a></td>';
        echo '<td><a href="excluirProduto.php?id=' . $row['Produto_id'] . '"><button type="button" class="btn btn-danger">Excluir</button></a></td>';
      }

      echo '</table>';

      // Adicione controles de paginação
      $sql = "SELECT COUNT(Produto_id) AS total FROM produto WHERE primeiro_nome LIKE '%$a%' AND categoria LIKE '%$b%'";
      $result = $conexao->query($sql);
      $row = $result->fetch_assoc();
      $total_results = $row['total'];
      $total_pages = ceil($total_results / $results_per_page);

      echo '<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">';
      // Fecha a tag ul
      echo '</ul>
  </nav>';

    } else {
      echo '<br>Erro do Banco de Dados. ' . $sql . '<br>' . $conexao->error;
    }

    $conexao->close();
    ?>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="#" enctype="multipart/form-data" method="POST">
            <div class="form-group">
              <label for="arquivo">Selecione o Arquivo:</label>
              <input type="file" class="form-control" name="arquivo" accept="image/*">
            </div>
            <div class="form-group">
              <label for="descricao">Nome:</label>
              <input type="text" class="form-control" name="nome">
            </div>
            <div class="form-group">
              <label for="descricao">descrição:</label>
              <input type="text" class="form-control" name="descricao">
            </div>
            <div class="form-group">
              <label for="descricao">Categoria:</label>
              <input type="text" class="form-control" name="categoria">
            </div>
            <div class="form-group">
              <label for="descricao">Valor:</label>
              <input type="text" class="form-control" name="valor"
                onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 13 || event.charCode == 44"
                required>
            </div>
            <button type="submit">Cadastrar</button>
          </form>
          <!-- Scrollable modal -->
          <div class="modal-dialog modal-dialog-scrollable">
            ...
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>