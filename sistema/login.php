<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Login PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <center>
    <?php
    include_once('conexao.php');
    if ($_POST) {
      $email = $_POST['email'];
      $senha = md5($_POST['senha']);
      $sql = "SELECT cliente_id, primeiro_nome,ultimo_nome,email,senha
                from cliente
            where email = '$email' and senha = '$senha' ";
      if ($result = $conexao->query($sql)) {
        if ($result->num_rows > 0) {
          $linha = $result->fetch_assoc();
          $_SESSION['nome'] = $linha['primeiro_nome'] . ' ' . $linha['ultimo_nome'];
          $_SESSION['id'] = $linha['cliente_id'];
          header("refresh:2;url=../inicio.php");
        } else {
          echo 'usuario ou senha invalidos';
        }
      }
    } else {
      $_SESSION['nome'] = '';
      unset($_SESSION['nome']);
    }
    ?>
    <?php
    // Verifique as credenciais do administrador
    if (isset($_POST['email']) && isset($_POST['senha'])) {
      $email = $_POST['email'];
      $senha = $_POST['senha'];
  
      // Se as credenciais forem válidas, autentica o administrador
      if ($email == 'artur@gmail.com' && $senha == '123456') {
      // Redireciona o usuário para o painel administrativo
      header('Location: paineladm.php');
      }
      }
    ?>
    <div class="container_form">
      <div class="myform__container form">
        <div class="logo mb-3">
          <div class="col-md-12 text-center">
            <h1>Login</h1>
          </div>
        </div>
        <form action="#" method="post">
          <div class="form-group">
            <label>Email ou CPF</label>
            <input type="text" name="email" class="form-control valid" placeholder="Insira seu Email ou CPF">
          </div>
          <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control valid" aria-describedby="emailHelp"
              placeholder="Senha">
          </div>
          <div class="col-md-12 text-center mt-4">
            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
            <br>
            <br>
            <p>Não tem cadastro ? <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastre-se</a></p>
          </div>
          <div class="form-group mt-4">
            <small>
              <br>
              <br>
              <br>
            </small>
          </div>
        </form>
      </div>
    </div>
    </small>
    </div>
    </form>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Cliente</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="post"
              action="cadastrarcliente.php">
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Primeiro Nome:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" placeholder="Digite seu primeiro nome"
                    name="primeiro">
                </div>
              </div>
              <br>
              <label class="control-label col-sm-2" id="label" for="email">ultimo Nome:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="Digite seu ultimo nome"
                  name="ultimo_nome">
              </div>
              <br>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">E-mail</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="pwd" placeholder="Digite seu e-mail" name="email">
                </div>
                <br>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Senha:</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd" placeholder="Digite sua senha" name="senha">
                  </div>
                  <br>
                </div>
                <div class="col-md-12 text-center mt-4">
                  <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                  <div id="mensagem-sucesso"></div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </center>
  </div>
  </center>
</body>

</html>