<?php
include 'conexao.php';

session_start();

// verifica se o formulário foi enviado
if (isset($_POST['delete'])) {
    $email = $_SESSION['email']; 

    // prepara uma consulta SQL para deletar um registro da tabela usuarios 
    $sql = "DELETE FROM usuarios WHERE email = ?";
    $instrucaoPreparada = $conexao->prepare($sql); // prepara a consulta SQL para ser executada pelo banco de dados
    $instrucaoPreparada->bind_param("s", $email); // vincula o parâmetro da consulta SQL com o valor de $email

    if ($instrucaoPreparada->execute()) { // executa a consulta preparada
        session_destroy(); // garante que todas as variáveis de sessão associadas ao usuário sejam removidas
        header("Location: ../index.html"); 
        exit;
    } else {
        echo "Erro ao excluir conta: " . $conexao->error;
    }
}
?>
