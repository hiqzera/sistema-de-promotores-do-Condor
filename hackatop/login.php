

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="hover.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>Login</title>
</head>
<body>
    <div class="main-container">
        <div class="logo">
            <img src="img/Supermercados_Condor_52a279a0e4.png" alt="" class="logo" style="margin-top: 5rem;">
        </div>
        <form action="validar-login.php" method="post">
            <input type="text" name="email" placeholder="E-mail" class="email" required><br/>
            <input type="password" name="senha" placeholder="Senha" class="password" required><br/>
            <input type="submit" class="btn-enviar" value="Enviar">
            <a href="cadastro.php" class="btn-cadastrar">Cadastro</a>
        </form>
        <?php
        if (isset($_SESSION["user_nivel_acesso"]) && $_SESSION["user_nivel_acesso"] === "administrador") {
            echo '<a href="cadastro.php" class="btn-cadastrar">Cadastro</a>';
        }
        ?>
    </div>
</body>
</html>
