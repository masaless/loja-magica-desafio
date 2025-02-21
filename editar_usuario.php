<?php
session_start();
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestão de Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include 'nav_bar.php'; ?>
  <?php include 'mensagem.php' ?>


  <div class="container  my-4">
    <h1 class="text-center">Editar Pedido Mágico</h1>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Pedido Mágico
              <a href="gestao_usuarios.php" class="btn btn-danger float-end">Voltar</a>
            </h4>
          </div>
          <div class="card-body">
            <?php
            if (isset($_GET['id_cliente'])) {
              $usuario_id = mysqli_real_escape_string($conexao, $_GET['id_cliente']);
              $sql_pedidos = "SELECT pedidos_magicos.id_pedido_magicos,
                                     pedidos_magicos.data_pedido_magico,
                                     pedidos_magicos.valor_total,
                                     itens_pedidos_magicos.id_item, -- Adicione o campo do ID do item
                                     itens_pedidos_magicos.produto,
                                     clientes.id_cliente,           -- Adicione o id do cliente
                                     clientes.nome, 
                                     clientes.email
                             FROM pedidos_magicos 
                             INNER JOIN clientes ON clientes.id_cliente = pedidos_magicos.cliente_id 
                             LEFT JOIN itens_pedidos_magicos ON pedidos_magicos.id_pedido_magicos = itens_pedidos_magicos.pedido_id
                             WHERE pedidos_magicos.cliente_id = '$usuario_id' LIMIT 1;";
              $query = mysqli_query($conexao, $sql_pedidos) or die("Erro na query: " . mysqli_error($conexao));


              if ($pedido = mysqli_fetch_assoc($query)) {


            ?>

                <form action="editar_usuario_pedido.php" method="POST">
                  <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($pedido['id_cliente']); ?>">
                  <input type="hidden" name="id_pedido" value="<?= htmlspecialchars($pedido['id_pedido_magicos']); ?>">
                  <input type="hidden" name="id_item" value="<?= htmlspecialchars($pedido['id_item']); ?>">

                  <div class="mb-3">
                    <label for="">Nome</label>
                    <input type="text" name="nome" value="<?= htmlspecialchars($pedido['nome']); ?>" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="">E-mail</label>
                    <input type="text" name="email" value="<?= htmlspecialchars($pedido['email']); ?>" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="">Produtos</label>
                    <input type="text" name="produto" value="<?= htmlspecialchars($pedido['produto']); ?>" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="">Data Pedido</label>

                    <input type="date" name="data_pedido" value="<?= htmlspecialchars($pedido['data_pedido_magico']); ?>" class="form-control" required>

                  </div>
                  <div class="mb-3">
                    <label for="">Valor</label>
                    <input type="text" name="valor" value="<?= $pedido['valor_total']; ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <button type="submit" name="editar_usuario" class="btn btn-primary">Salvar</button>
                  </div>
                </form>
            <?php
              } else {
                echo "<h5>Cliente não encontrado.</h5>";
              }
            } else {
              echo "<h5>Nenhum ID de cliente informado na URL.</h5>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>