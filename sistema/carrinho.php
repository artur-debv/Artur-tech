<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

if (isset($_GET['acao'])) {
    // ADICIONAR CARRINHO 
    if ($_GET['acao'] == 'add') {
        $id = $_GET['id'];
        if (!isset($_SESSION['carrinho'][$id]))
            $_SESSION['carrinho'][$id] = 1;
        else
            $_SESSION['carrinho'][$id] += 1;
    }

    // EXCLUIR COMPRA  
    if ($_GET['acao'] == 'dell') {
        $id = $_GET['id'];
        unset($_SESSION['carrinho'][$id]);
    }

    // ALTERAR QUANTIDADE
    if ($_GET['acao'] == 'up') {
        if (isset($_POST['prod']) && is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $id => $qtd) {
                if (!empty($qtd) || $qtd <> 0)
                    $_SESSION['carrinho'][$id] = $qtd;
                else
                    unset($_SESSION['carrinho'][$id]);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Carrinho</title>
</head>

<body>
    <div class="container">
        <?php
        $total = 0;
        if (!empty($_SESSION['carrinho'])) {
            echo '<table class="table table-striped">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Descrição </th>
                    <th>Quantidade </th>
                    <th>Preço </th>
                    <th>Subtotal </th>
                    <th>Remover</th>
                </tr>
            </thead>
            <tbody>';
            echo '<form action="?acao=up" method="post">';
            foreach ($_SESSION['carrinho'] as $id => $qtd) {
                include_once('conexao.php');
                $sql = "select * from produto where produto_id = $id";
                $result = $conexao->query($sql);
                $row = $result->fetch_assoc();
                $subtotal = ($qtd * $row['preco']);
                echo '<tr>';
                echo '<td> <img src="img/' . $row['imagem'] . '" width="120px" height="120px"/></td>
                <td>' . $row['primeiro_nome'] . '</td>';
                echo '<td align="center">
                <div class="form-group">
                <input type="number" class="form-control" min="0" max="1000" name="prod[' . $id . ']" value="' . $qtd . '">
                </div>
                
                </td>';
                echo '<td>R$' . number_format($row['preco'], 2, ',', '.') . '</td>
                <td>R$' . number_format($subtotal, 2, ',', '.') . '</td>
                <td> <a href="?acao=dell&id=' . $row['produto_id'] . '"><img src="../img/carrinho/lixeira.png" height="50px" width="50px" /></a> </td> 
            </tr>';

                $total += $subtotal;
            }
            echo '</tbody>
            </table>';
            echo '<p>Total Geral: R$' . number_format($total, 2, ',', '.') . '';
            echo '<a href="../inicio.php"><button type="button" class="btn btn-info btn-block">Continuar comprando</button></a>';
            echo '<tr>';
            echo '<td colspan="3">
                <button type="submit" class="btn btn-primary btn-block">Atualizar Carrinho</button>';
        } else {
            echo '<p><center>Carrinho vazio. <a href="../inicio.php">Continuar comprando</a></p></center>';
        }
        echo '</form>';
        echo '<br></br>';
        echo '<div class="panel panel-primary">
    <div class="panel-heading text-center">Tipo de Pagamento</div>
    <div class="panel-body">						  
    <form action="finalizar.php" method="post">
        <div class="form-group">
            <label for="sel1">Forma de Pagamento:</label>
            <select class="form-control" name="forma">
              <option value="CARTAO MASTERCARD">CARTAO MASTERCARD</option>
              <option value="CARTAO VISA">CARTAO VISA</option>
              <option value="PIX">PIX</option>
              <option value="BOLETO">BOLETO</option>
              <option value="DEPOSITO">DEPOSITO</option>
            </select>
          </div>							
        <button type="submit" class="btn btn-primary btn-block">Finalizar Venda</button>
    </form>					  
    </div>
  </div>';


        ?>
    </div>
</body>

</html>