<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <style>
    body {
      background-color: white;
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
      width: 100%;
      margin-bottom: 1rem;
      vertical-align: top;
      border-color: var(--bs-table-border-color);
      width: 70%;
      position: absolute;
      left: 25%;
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
  <?php
  include_once('conexao.php');
  if ($_POST) {
    $nome = $_POST['nome'];
    $ultimo = $_POST['ultimo'];
    $ordenacao = $_POST['ordenacao'];
  } else {
    $nome = '';
    $ultimo = '';
    $ordenacao = 'primeiro_nome';
  }
  $sql = "select 
	  				cliente_id, primeiro_nome, ultimo_nome, email, senha
			  from 
			        cliente
			  where
			        primeiro_nome like '%$nome%' and
					ultimo_nome like '%$ultimo%'
			  order by $ordenacao";

  if ($result = $conexao->query($sql)) {
    echo 'Número de Registros: ' . $result->num_rows . '<br>';
    echo '<p>';
    echo '<form action="#" method="post">';
    echo '</form>';
    echo '<p><br />';
    echo '<p>';
    echo '<table class="table table-striped">';
    echo '<tr>';
    echo '<th>Cliente ID</th>';
    echo '<th>Primeiro nome</th>';
    echo '<th>Último nome</th>';
    echo '<th>E-mail</th>';
    echo '<th>Senha</th>';
    echo '<th>Alterar</th>';
    echo '<th>Excluir</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . $row['cliente_id'] . '</td>';
      echo '<td>' . $row['primeiro_nome'] . '</td>';
      echo '<td>' . $row['ultimo_nome'] . '</td>';
      echo '<td>' . $row['email'] . '</td>';
      echo '<td>' . $row['senha'] . '</td>';
      echo '<td><a href="AlterarCliente.php?id=' . $row['cliente_id'] . '"><button type="button" class="btn btn-success">Alterar</button></a></td>';
      echo '<td><a href="excluirCliente.php?id=' . $row['cliente_id'] . '"><button type="button" class="btn btn-danger">Excluir</button></a></td>';
    }

    echo '</table>';
  } else
    echo 'Erro SQL: ' . $conexao->error;
  $conexao->close();
  ?>
</body>

</html>