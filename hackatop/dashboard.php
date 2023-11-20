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
    <title>Dashboard de PDV</title>
</head>
<body>
    <h1>Dashboard de PDV</h1>
    
    <!-- Formulário para adicionar produtos -->
    <form method="post">
        <label for="produto">Produto:</label>
        <select name="produto" id="produto">
            <option value="produto1">Produto 1 - R$ 10.00</option>
            <option value="produto2">Produto 2 - R$ 15.00</option>
            <option value="produto3">Produto 3 - R$ 20.00</option>
        </select>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" value="1" min="1">
        <input type="submit" name="adicionar" value="Adicionar ao Carrinho">
    </form>
    
    <?php
    // Verifica se o formulário foi enviado
    if (isset($_POST['adicionar'])) {
        $produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];
        
        // Aqui você pode adicionar lógica para calcular o total com base no produto e na quantidade selecionados
        $total = calcularTotal($produto, $quantidade);
        
        echo "<p>Produto: $produto</p>";
        echo "<p>Quantidade: $quantidade</p>";
        echo "<p>Total: R$ $total</p>";
    }
    
    // Função para calcular o total com base no produto e quantidade
    function calcularTotal($produto, $quantidade) {
        // Aqui você pode implementar a lógica para calcular o total com base no produto selecionado
        $precos = [
            'produto1' => 10.00,
            'produto2' => 15.00,
            'produto3' => 20.00
        ];
        
        if (array_key_exists($produto, $precos)) {
            $precoUnitario = $precos[$produto];
            return $precoUnitario * $quantidade;
        } else {
            return 0;
        }
    }
    ?>
    <a href="index.php" class="btn-voltar" >Voltar para o início</a>

</body>
</html>
