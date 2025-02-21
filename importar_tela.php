<?php
session_start();
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Logica Mágica</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php include 'nav_bar.php' ?>
  <h1 class="text-center">Importação da planilha</h1>
  <div class="container mt-4">
  <div class="row justify-content-center ">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Importar Arquivo
        </div>
        <div class="card-body">
          
          <form method="POST" action="importar_excel.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="formFile" class="form-label">Arquivo</label>
              <input type="file" name="arquivo" id="formFile" class="form-control">
            </div>
            <div class="d-grid">
              <input type="submit" value="Enviar" class="btn btn-dark">
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>