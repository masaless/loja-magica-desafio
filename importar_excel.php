<?php
session_start();
require 'conexao.php';


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mensagens = [];

// função para converter o número por extenso no arquivo CSV
function converterStringParaNumero($numeroPorExtenso)
{
  $mapNumeros = [
    'cinquenta' => 50.0,
  ];

  $numeroPorExtenso = trim(strtolower($numeroPorExtenso));
  return $mapNumeros[$numeroPorExtenso] ?? null;
}



if (!isset($_FILES['arquivo']) || $_FILES['arquivo']['error'] != 0) {
  die("Erro no upload do arquivo.");
}

$arquivo = $_FILES['arquivo'];

if ($arquivo['type'] != 'text/csv') {
  die("É necessário enviar um arquivo CSV.");
}

$handle = fopen($arquivo['tmp_name'], 'r');

fgetcsv($handle, 1000, ";");

while ($linha = fgetcsv($handle, 1000, ";")) {

  $nome = $linha[0];
  $email = $linha[1];
  $produto = $linha[2];
  $data_pedido_magico = trim($linha[3]);
  $valor_total = trim($linha[4]);

  if (empty($data_pedido_magico)) {
    echo "Data pedido vazio para o cliente $nome. Linha ignorada! <br>";
    continue;
  }

  if (empty($valor_total)) {
    echo "Valor total vazio para o cliente $nome. Linha ignorada! <br>";
    continue;
  }


  $valor_total = converterStringParaNumero($valor_total);
   if ($valor_total === null) {
        echo "Valor total inválido para o cliente $nome. Linha ignorada!  <br>";
        continue;
    }



  $resultado = $conexao->query("SELECT id_cliente FROM clientes WHERE email = '$email'");

  if ($resultado->num_rows > 0) {
    $cliente = $resultado->fetch_assoc();
    $idCliente = $cliente['id_cliente'];
  } else {
    $conexao->query("INSERT INTO clientes (nome, email) VALUES ('$nome', '$email')");
    $idCliente = $conexao->insert_id;
  }

  $conexao->query("INSERT INTO pedidos_magicos (cliente_id, data_pedido_magico, valor_total) VALUES ($idCliente, '$data_pedido_magico', '$valor_total')");
  $idPedido = $conexao->insert_id;

  $conexao->query("INSERT INTO itens_pedidos_magicos (pedido_id, produto) VALUES ($idPedido,'$produto')");
}

fclose($handle);

echo "Importação concluída com sucesso!!";


