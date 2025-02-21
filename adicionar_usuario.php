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
  <?php include 'mensagem.php'?>

  
  <div class="container  my-4">
    <h1 class="text-center">Adicionar Pedido Mágico</h1>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Pedido Mágico
              <a href="index.php" class="btn btn-danger float-end">Voltar</a>
            </h4>
          </div>
          <div class="card-body">
            <form action="create_usuario.php" method="POST">
              <div class="mb-3">
                <label for="" >Nome</label>
                <input type="text" name="nome" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="">E-mail</label>
                <input type="text" name="email" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="">Produtos</label>
                <input type="text" name="produto" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="">Data Pedido</label>
                <input type="date" name="data_pedido" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="">Valor</label>
                <input type="text" name="valor" class="form-control" required>
              </div>
              <div class="mb-3">
                <button type="submit" name="create_usuario" class="btn btn-primary">Salvar</button>
              </div>
            </form>
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