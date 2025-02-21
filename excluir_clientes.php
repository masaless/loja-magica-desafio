<?php
session_start();
require 'conexao.php';

if (isset($_POST['id_cliente'])) {
    $id_cliente = mysqli_real_escape_string($conexao, $_POST['id_cliente']);

    $sql = "DELETE FROM clientes WHERE id_cliente = '$id_cliente'";
    if (mysqli_query($conexao, $sql)) {
        $_SESSION['mensagem'] = "Pedido excluir com sucesso!";
        header("Location: gestao_usuarios.php");
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao excluir usuário: " . mysqli_error($conexao);
        header("Location: gestao_usuarios.php");
        exit;
    }
} else {
    $_SESSION['mensagem'] = "ID do usuário não informado!";
    header("Location: gestao_usuarios.php");
    exit;
}
?>
