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
  <?php include 'mensagem.php'; ?>
  <div class="container  my-4">
    <h1 class="text-center">Gestão Clientes</h1>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Clientes
              <a href="index.php" class="btn btn-danger float-end">Voltar</a>
            </h4>
          </div>
          <div class="card-body">
            <?php
            // Consulta todos os clientes
            $sql = "SELECT * FROM clientes";
            $query = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($query) > 0) {
              while ($cliente = mysqli_fetch_assoc($query)) {
            ?>
                <div class="mb-3">
                  <strong>Nome:</strong> <?= htmlspecialchars($cliente['nome']); ?><br>
                  <strong>E-mail:</strong> <?= htmlspecialchars($cliente['email']); ?><br>

                  <a href="visualizar.php?id_cliente=<?= $cliente['id_cliente']; ?>"
                    class="btn btn-warning mt-2">
                    Ver Pedidos
                  </a>
                </div>
                <hr>
            <?php
              }
            } else {
              echo "<h5>Nenhum cliente encontrado.</h5>";
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