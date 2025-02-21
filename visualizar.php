<?php
session_start();
require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visualizar Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include 'nav_bar.php'; ?>

  <h1 class="text-center">Detalhes do Cliente</h1>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Cliente
              <a href="gestao_usuarios.php" class="btn btn-danger float-end">Voltar</a>
            </h4>
          </div>
          <div class="card-body">
            <?php
            if (isset($_GET['id_cliente'])) {
              $usuario_id = mysqli_real_escape_string($conexao, $_GET['id_cliente']);
              $sql = "SELECT * FROM clientes WHERE id_cliente = '$usuario_id'";
              $query = mysqli_query($conexao, $sql) or die("Erro na query: " . mysqli_error($conexao));

              if (mysqli_num_rows($query) > 0) {
                $clientes = mysqli_fetch_assoc($query);
            ?>
                <div class="mb-3">
                  <label><strong>Nome</strong></label>
                  <p class="form-control"><?= htmlspecialchars($clientes['nome']); ?></p>
                </div>
                <div class="mb-3">
                  <label><strong>E-mail</strong></label>
                  <p class="form-control"><?= htmlspecialchars($clientes['email']); ?></p>
                </div>
            <?php
              } else {
                echo "<h5>Cliente não encontrado.</h5>";
              }
            } else {
              echo "<h5>Nenhum ID de cliente informado na URL.</h5>";
            }
            ?>

            <div class="card ">
              <div class="card-body bg-secondary text-white">
                <h4>Pedidos</h4>
                <?php
                if (isset($_GET['id_cliente'])) {
                  $usuario_id = mysqli_real_escape_string($conexao, $_GET['id_cliente']);
                  $sql_pedidos = "SELECT pedidos_magicos.id_pedido_magicos,
	                                   pedidos_magicos.data_pedido_magico,
                                     pedidos_magicos.valor_total,
                                     itens_pedidos_magicos.produto
                              FROM pedidos_magicos  
                              LEFT JOIN itens_pedidos_magicos ON pedidos_magicos.id_pedido_magicos = itens_pedidos_magicos.pedido_id
                              WHERE pedidos_magicos.cliente_id = '$usuario_id' LIMIT 1";

                  $query = mysqli_query($conexao, $sql_pedidos) or die("Erro na query: " . mysqli_error($conexao));

                  if ($pedido = mysqli_fetch_assoc($query)) {

                ?>
                    <div class="mb-3">
                      <label><strong>Nome Produto</strong></label>
                      <p class="form-control"><?= htmlspecialchars($pedido['produto']); ?></p>
                    </div>
                    <div class="mb-3">
                      <label><strong>Data Pedido</strong></label>
                      <p class="form-control"><?= date('d/m/Y', strtotime($pedido['data_pedido_magico'])); ?></p>
                    </div>
                    <div class="mb-3">
                      <label><strong>Valor Pedido</strong></label>

                      <p class="form-control"><?= htmlspecialchars($pedido['valor_total']); ?></p>
                    </div>

                <?php
                  } else {
                    echo "<h5>Produto não encontrado.</h5>";
                  }
                } else {
                  echo "<h5>Nenhum ID de cliente informado na URL.</h5>";
                }
                ?>
              </div>

            </div>
            <div class="card-header">
              <h4>
                <a href="editar_usuario.php?id_cliente=<?= $usuario_id; ?>" class="btn btn-success float-start">Editar</a>
                <form action="excluir_clientes.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                  <input type="hidden" name="id_cliente" value="<?= $usuario_id; ?>">
                  <button type="submit" class="btn btn-danger">Excluir</button>
                </form>



              </h4>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>