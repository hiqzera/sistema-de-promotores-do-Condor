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
    <title>Cadastro</title>
</head>
<body>
    <div class="main-cadastro">
        <div class="logo">
            <img src="img/Supermercados_Condor_52a279a0e4.png" alt="" class="logo" height="70rem" style="filter: drop-shadow(0px 0px 10px #000000);">
        </div>
        <form action="processar-cadastro.php" method="post" class="forms">
            <input type="text" name="nome" placeholder="Nome" class="nome" required><br/>
            <input type="text" name="email" placeholder="E-mail" class="email" required><br/>
            <input type="password" name="senha" placeholder="Senha" class="password" required><br/>
            <input type="text" name="telefone" placeholder="Telefone" class="telefone" required><br/>
            <input type="text" name="marca" placeholder="Marca" class="marca" required><br/>
            <input type="text" name="produto" placeholder="Produto" class="produto" required><br/>
            <label for="nivel_acesso" style="margin-left: 0.5rem; color: #fff; font-size: 16px;">Nível de Acesso:</label>
            <select name="nivel_acesso" id="nivel_acesso" style="font-size: 12px;">
                <option value="administrador" style="font-size: 12px;">Administrador</option>
                <option value="usuario_padrao" style="font-size: 12px;">Usuário Padrão</option>
            </select><br/>
            <input type="submit" class="btn-enviar" value="Enviar" href="login.php">
        </form>
    </div>
</body>
</html>