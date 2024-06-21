<?php
$updateMessage = "";

$host = "localhost";
$user = "root";
$pass = "";
$bd = "projetoPhp";

$conn = new mysqli($host, $user, $pass, $bd);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome = $email = $senha = $telefone = "";

// Verifica se o usuário está logado 
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql_select = "SELECT * FROM usuarios WHERE id='$id'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $email = $row['email'];
        $telefone = $row['telefone'];
    }
}

// Verificação se o formulário foi enviado
if (isset($_POST['update'])) {
    // Recuperação dos dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

    // Verifica o ID do usuário com base no email
    $sql_select = "SELECT id FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];

        // Atualização dos dados no banco de dados
        $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', telefone='$telefone' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            $updateMessage = "<p style='color: green'>Dados atualizados com sucesso</p>";
        } else {
            $updateMessage = "<p style='color: red'>Erro ao atualizar dados: " . $conn->error . "</p>";
        }
    } else {
        $updateMessage = "<p style='color: red'>Nenhum usuário encontrado com o email fornecido.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="../css/perfilEstilo.css">

</head>

<body>
    <div class="container">
        <h1>Perfil do Usuário</h1>
        <?php echo $updateMessage; ?>
        <form method="POST" action="atualizarDados.php">
            <p><strong>Nome:</strong>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
            </p>
            <p><strong>Email:</strong>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>
            </p>
            <p><strong>Telefone:</strong> <!-- Adicionando o campo telefone -->
                <input type="text" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>">

            <p><strong>Senha:</strong>
                <input type="password" name="senha" value="<?php echo htmlspecialchars($senha); ?>">
                <span class="iconeMostrarSenhaAtualizada" onclick="MostrarSenha()">👁️</span>
            </p>

            <div class="botaoContainer">
                <button type="submit" name="update">Atualizar Dados</button>
                <a href="sairDaConta.php" class="botaoSairDaConta">Sair da conta</a>
            </div>
        </form>

        <form method="POST" action="excluirConta.php">
            <button type="submit" name="delete" class="botaoExcluirConta botaoExcluirContaAtualizada">Excluir Conta</button>
        </form>
    </div>

    <script src="../js/mostrarSenha.js"></script>
</body>

</html>