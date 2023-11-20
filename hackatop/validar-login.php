<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "base");
    
    // Verifica se há erro na conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtém os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Consulta SQL para selecionar o usuário com base no e-mail
    $sql = "SELECT id, nome, senha, nivel_acesso FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se um usuário foi encontrado
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashSenha = $row["senha"];

        // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
        if (password_verify($senha, $hashSenha)) {
            session_start();
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["nome"];
            $_SESSION["user_nivel_acesso"] = $row["nivel_acesso"];
            
            header("Location: index.php");
            exit();
        } else {
            echo "Senha incorreta. Tente novamente.";
        }
    } else {
        echo "E-mail não encontrado. Verifique seu e-mail e tente novamente.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}

?>
