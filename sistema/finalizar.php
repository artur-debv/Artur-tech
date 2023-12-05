<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

?>
<!DOCTYPE html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" align="center">
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" align="center">

        <div class="content" align="center">

            <div class="table-responsive" align="center">
                <?php
                if (count($_SESSION['carrinho']) == 0) {
                    echo '<div class="alert alert-warning"> 
                    <strong>NÃO HÁ PRODUTOS NO CARRINHO.</strong></div>';
                    header("location:../inicio.php");
                } else {
                    require_once("conexao.php");
                    $total = 0;
                    $data = date("Y-m-d");
                    $hora = date("H:i:s");

                    if (!empty($_POST["pgto"]))
                        $forma_pgto = $_POST["pgto"];
                    else
                        $forma_pgto = '';
                    // Verificar se 'cliente_id' está definido antes de usá-lo
                    $id_cliente = isset($_SESSION['cliente_id']) ? $_SESSION['cliente_id'] : null;

                    if ($id_cliente !== null) {
                        $sql = "update vendas set total_nota = $total, numero_itens = $total_qtd, cliente_id = $id_cliente where id_vendas = $id_vendas";
                        $result = $conexao->query($sql_vendas);
                    }
                    $id_vendas = $conexao->insert_id;
                    $total_qtd = 0;
                    foreach ($_SESSION['carrinho'] as $id => $qtd) {

                        $sql = "SELECT *  FROM produto WHERE produto_id= $id";
                        $qr = $conexao->query($sql);
                        $ln = $qr->fetch_assoc();
                        $id_produto = $ln['produto_id'];
                        $preco_unitario = $ln['preco'];
                        $total_item = $preco_unitario * $qtd;
                        $total_qtd += $qtd;

                        $total += $total_item;

                        $sql = "insert into vendas_item (id_produto, quantidade,preco_unitario, id_vendas, total_item) values (
                                $id_produto, $qtd, $preco_unitario, $id_vendas, $total_item)";

                        $qr = $conexao->query($sql);
                    }

                    $sql = "update vendas set total_nota = $total, numero_itens = $total_qtd where id_venda = $id_vendas";
                    $qr = $conexao->query($sql);
                    unset($_SESSION['carrinho']);

                    

                    echo '<br><div class="alert alert-success">
                            <strong>Compra finalizada com sucesso!</strong>
                          </div>';
                    echo ' <div class="row">
                          <div class="col-sm-6"><h1>Compra: ' .   $id_vendas .  '</h1></div>
                          <div class="col-sm-6"><h1>Cliente: ' . $id_cliente . '-' . $_SESSION['nome'] . '</h1></div>
                        </div>';
                    echo '<h1>Total da Compra: R$ ' . number_format($total, 2, ',', '.') . '</h1><br>';
                    echo '<a href=pedidos.php?id_cliente=' . $id_cliente . '><button type="button" class="btn btn-primary">MEUS PEDIDOS</button></a>';
                    echo '<br><br><br>';
                    echo '<a href=index.php><button type="button" class="btn btn-success">PÁGINA INICIAL</button></a>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1">
    </div>
</body>
</html>