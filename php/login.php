<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta SQL
    $instrucaoPreparada = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $instrucaoPreparada->bind_param("ss", $email, $senha); // vincula os valores das variáveis $email e $senha aos lugares onde estão os ? na consulta SQL
    $instrucaoPreparada->execute(); // consulta SQL é enviada ao banco de dados para execução com os valores dos parâmetros
    $resultadoConsulta = $instrucaoPreparada->get_result(); // obtém o resultado da consulta do banco de dados

    // Verifica se encontrou algum usuário
    if ($resultadoConsulta->num_rows > 0) {
        // Recupera os dados do usuário
        $row = $resultadoConsulta->fetch_assoc();

        // Inicia a sessão e armazenar as informações do usuário
        session_start();
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['telefone'] = $row['telefone'];
        $_SESSION['senha'] = $row['senha'];

        header('Location: perfil.php');
        exit;
    } else {
        echo "Usuário ou senha incorretos";
    }
}
