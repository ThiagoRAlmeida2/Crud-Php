<?php
$host = "localhost";
$user = "root";
$pass = "";
$bd = "projetoPhp";

// Estabelece uma conexão com o banco de dados usando os parâmetros de configuração 
$conexao = new mysqli($host, $user, $pass, $bd);

// Verifica se a conexão foi estabelecida com sucesso
if ($conexao->connect_error) {
    echo "Conexão falhou: " . $conexao->connect_error;
}
?>
