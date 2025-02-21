<?php 

$host = "localhost";
$dbname = "db_loja_magica";
$username = "root";
$pass = "123456789";


$conexao = mysqli_connect($host, $username, $pass, $dbname);

if(!$conexao){
  echo ("Erro na conexão " .mysqli_connect_error());
}

$conexao->set_charset('utf8mb4');
