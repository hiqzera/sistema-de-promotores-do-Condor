<?php
// Inicie a sessão para acessar os dados do usuário
session_start();

// Verifique se o usuário está logado
if (isset($_SESSION['user_id'])) {
    // Dados de conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base";

    // Conecta ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtém o ID do usuário da sessão
    $user_id = $_SESSION['user_id'];

    // Consulta SQL para obter os dados do usuário
    $sql = "SELECT nome, email, telefone, marca, produto, nivel_acesso FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $email = $row["email"];
        $telefone = $row["telefone"];
        $marca = $row["marca"];
        $produto = $row["produto"];
        $nivel_acesso = $row["nivel_acesso"];

        // Exibe os dados do usuário
        echo "<h1>Seu Perfil</h1>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>Telefone:</strong> $telefone</p>";
        echo "<p><strong>Marca:</strong> $marca</p>";
        echo "<p><strong>Produto:</strong> $produto</p>";
        echo "<p><strong>Nível de Acesso:</strong> $nivel_acesso</p>";
    } else {
        echo "Usuário não encontrado.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    // Redirecionar para a página de login se o usuário não estiver logado
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="hover.css" rel="stylesheet" media="all">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Página Principal</title>
</head>
<body>
<a href="index.php" class="btn-voltar">Voltar para o início</a>
</body>