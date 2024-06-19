<?php
session_start(); // armazena dados do usuário

if (!isset($_SESSION['email'])) { // erifica se a variável de sessão 'email' não está definida
    header('Location: login.php'); // usuário não autenticado
}

// recuperação de dados do usuário
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$telefone = $_SESSION['telefone'];  

include '../perfil.html'; // interface com dados do usuário
?>
