<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos obrigatórios estão definidos
    if (isset($_POST["nome"], $_POST["email"], $_POST["senha"], $_POST["telefone"], $_POST["marca"], $_POST["produto"], $_POST["nivel_acesso"])) {
        // Obtém os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Hash da senha
        $telefone = $_POST["telefone"];
        $marca = $_POST["marca"];
        $produto = $_POST["produto"];
        $nivel_acesso = $_POST["nivel_acesso"];

        // Conecta ao banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Prepara a instrução SQL para inserir os dados
        $sql = "INSERT INTO usuarios (nome, email, senha, telefone, marca, produto, nivel_acesso) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $nome, $email, $senha, $telefone, $marca, $produto, $nivel_acesso);

        // Executa a instrução SQL
        if ($stmt->execute()) {
            echo "<p>Usuário cadastrado com sucesso.</p>";
            // Redirecionar para a página de login
            header("Location: login.php");
            exit(); // Certifique-se de encerrar o script após o redirecionamento
        } else {
            echo "Erro ao cadastrar o usuário: " . $stmt->error;
        }
        

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        echo "Certifique-se de preencher todos os campos obrigatórios no formulário.";
    }
}
?>
