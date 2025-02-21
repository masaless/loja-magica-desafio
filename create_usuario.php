<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_usuario'])) {
  $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
  $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
  $sql = "INSERT INTO clientes (nome, email) VALUES ('$nome', '$email')";
  mysqli_query($conexao, $sql);

  if(mysqli_affected_rows($conexao) > 0){
    $idCliente = mysqli_insert_id($conexao);
    
    $produto = mysqli_real_escape_string($conexao, trim($_POST['produto']));
    $data_pedido_magico = mysqli_real_escape_string($conexao, trim($_POST['data_pedido']));
    $valor_total = mysqli_real_escape_string($conexao, trim($_POST['valor']));
    
    $sql_pedido = "INSERT INTO pedidos_magicos (cliente_id, data_pedido_magico, valor_total) VALUES ($idCliente, '$data_pedido_magico', '$valor_total')";
   
    mysqli_query($conexao, $sql_pedido);
    
    if(mysqli_affected_rows($conexao) > 0){
      $idPedido = mysqli_insert_id($conexao);
      $sql_item =  "INSERT INTO itens_pedidos_magicos (pedido_id, produto) VALUES ($idPedido, '$produto')";
      mysqli_query($conexao, $sql_item);
      
      if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Pedido Criado com sucesso!';
        header('Location: adicionar_usuario.php');
        exit;
      }
    }
  }
}

?>