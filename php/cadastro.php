<?php include 'conexao.php';

// Verifica se a requisição foi feita via método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    // Prepara a consulta SQL para inserir os dados na tabela 'usuarios'
    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, telefone, senha) VALUES (?, ?, ?, ?)");
    
    // Faz a vinculação dos parâmetros com a consulta preparada
    $stmt->bind_param("ssss", $nome, $email, $telefone, $senha);

    // Executa a consulta preparada
    if ($stmt->execute() === TRUE) {
        
        session_start();
        
        // Armazena os dados do usuário na sessão
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['telefone'] = $telefone;
        $_SESSION['senha'] = $senha;  

        header('Location: perfil.php');
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }
}
?>
