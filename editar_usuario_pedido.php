<?php
session_start();
require 'conexao.php';

if (isset($_POST['editar_usuario'])) {
  $idCliente = mysqli_real_escape_string($conexao, $_POST['id_cliente']);
  $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
  $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
  $idPedido = mysqli_real_escape_string($conexao, $_POST['id_pedido']);
  $produto = mysqli_real_escape_string($conexao, trim($_POST['produto']));
  $data_pedido_magico = mysqli_real_escape_string($conexao, trim($_POST['data_pedido']));
  $valor_total = mysqli_real_escape_string($conexao, trim($_POST['valor']));
  $idItem = mysqli_real_escape_string($conexao, $_POST['id_item']);

  $sql = "UPDATE clientes SET nome = '$nome', email = '$email' WHERE id_cliente = $idCliente";
  if (!mysqli_query($conexao, $sql)) {
    die("Erro ao atualizar clientes: " . mysqli_error($conexao));
  }

  $sql_pedido = "UPDATE pedidos_magicos SET data_pedido_magico = '$data_pedido_magico', valor_total = '$valor_total' WHERE id_pedido_magicos = $idPedido";
  if (!mysqli_query($conexao, $sql_pedido)) {
    die("Erro ao atualizar pedidos: " . mysqli_error($conexao));
  }

  $sql_item = "UPDATE itens_pedidos_magicos SET produto = '$produto' WHERE id_item = $idItem";
  if (!mysqli_query($conexao, $sql_item)) {
    die("Erro ao atualizar itens: " . mysqli_error($conexao));
  }

  $_SESSION['mensagem'] = 'Pedido Editado com sucesso!!';
  header('Location: gestao_usuarios.php');
  exit;
}
