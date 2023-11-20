<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "base");

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT id, nome, senha, nivel_acesso FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashSenha = $row["senha"];
        $nivelAcesso = $row["nivel_acesso"];

        if (password_verify($senha, $hashSenha)) {
            session_start();
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["nome"];
            $_SESSION["user_nivel_acesso"] = $nivelAcesso;
            header("Location: index.php");
            exit();
        } else {
            echo "Senha incorreta. Tente novamente.";
        }
    } else {
        echo "E-mail não encontrado. Verifique seu e-mail e tente novamente.";
    }

    $conn->close();
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
    <header>
        <nav class="navbar" style="background: #10337c; height: 350vh; font-weight: 700;">
            <nav class="container-navbar" style="margin-bottom: 250vh;">
                <div class="background"></div>
                <a href="index.php"><img src="img/Supermercados_Condor_52a279a0e4.png" class="logo" style="margin-top: -19rem; display: flex; margin-left: 1rem;"></img></a>
            </nav>
                <div class="nav-left">
                    <a href="index.php" class="inicio">Início</a>
                    <a href="produtos.php" class="prod">Produtos</a>
                    <a href="dashboard.php" class="dash">Dashboard de PDV</a>
                    <a href="objetivos.php" class="objets">Objetivos</a>
                    <a href="calendar.php" class="calendar">Calendário Promocional</a>
                </div>
                <div class="nav-right" style="margin-bottom: 250vh; margin-top: -35rem; margin-right: 1rem; text-decoration: none;">
                    <div class="perfil" style="margin-left: 1rem;"><a href="perfil.php"><img src="img/guest.png" alt="" width="50rem" style="opacity: 25%; margin: 0.75rem;"></a></div>
                </div>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php" class="btn-logout">Sair</a>
        <?php endif; ?>
        </nav>    
    </header>
    <?php if (isset($_SESSION['user_nivel_acesso']) && $_SESSION['user_nivel_acesso'] === 'administrador'): ?>
        <a href="cadastro.php" class="btn-cadastro" style="position: absolute; margin-left: 67rem; margin-top: -138.5rem; display: flex; font-weight: 700;">Cadastro</a>
    <?php endif; ?>
</body>
<footer>
    <div class="footer">
        Fim da Página!
    </div>
</footer>
</html>