<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base";

// Função para formatar a data do MySQL (aaaa-mm-dd) para o formato brasileiro (dd/mm/aaaa)
function formatarData($data) {
    return date("d/m/Y", strtotime($data));
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se as chaves existem no array $_POST
    if (isset($_POST["data_promocao"], $_POST["descricao_promocao"])) {
        // Obtém a data da promoção no formato brasileiro (dd/mm/aaaa)
        $data_promocao_br = $_POST["data_promocao"];

        // Converte a data do formato brasileiro para o formato do MySQL (aaaa-mm-dd)
        $data_promocao_mysql = DateTime::createFromFormat('d/m/Y', $data_promocao_br)->format('Y-m-d');

        // Obtém a descrição da promoção
        $descricao_promocao = $_POST["descricao_promocao"];

        // Conecta ao banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Prepara a instrução SQL para inserir os dados
        $sql = "INSERT INTO calendario_promocional (data_promocao, descricao_promocao) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $data_promocao_mysql, $descricao_promocao);

        // Executa a instrução SQL
        if ($stmt->execute()) {
            echo "<p>Promoção definida para: $data_promocao_br</p>";
            echo "<p>Descrição da Promoção: $descricao_promocao</p>";
        } else {
            echo "Erro ao inserir a promoção no banco de dados: " . $stmt->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        echo "Certifique-se de preencher todos os campos obrigatórios no formulário.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Calendário Promocional</title>
</head>
<body>
    <h1>Calendário Promocional</h1>

    <form method="post">
        <label for="data_promocao">Selecione a data da promoção:</label>
        <input type="text" name="data_promocao" id="data_promocao" placeholder="dd/mm/aaaa">

        <!-- Adiciona uma caixa de texto para a descrição da promoção -->
        <label for="descricao_promocao">Descrição da Promoção:</label>
        <textarea name="descricao_promocao" id="descricao_promocao" style="height: 3rem; width: 10%;" rows="4"></textarea>

        <input type="submit" value="Definir Promoção">
    </form>

    <table>
        <thead>
            <tr>
                <th>Domingo</th>
                <th>Segunda-feira</th>
                <th>Terça-feira</th>
                <th>Quarta-feira</th>
                <th>Quinta-feira</th>
                <th>Sexta-feira</th>
                <th>Sábado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $data_atual = new DateTime('first day of this month');
                $primeiro_dia_semana = $data_atual->format('N');

                for ($i = 1; $i < $primeiro_dia_semana; $i++) {
                    echo "<td></td>";
                }

                for ($dia = 1; $dia <= $data_atual->format('t'); $dia++) {
                    $data_br = $data_atual->format('d/m/Y');
                    echo "<td><span>$dia";

                    // Exibe a descrição da promoção, se houver, no calendário
                    if (isset($_POST['data_promocao']) && $data_br == formatarData($_POST['data_promocao'])) {
                        echo "<br><span style='color: red;'>{$_POST['descricao_promocao']}</span>";
                    }

                    echo "</span></td>";

                    if ($data_atual->format('N') == 7) {
                        echo "</tr><tr>";
                    }

                    $data_atual->modify('+1 day');
                }
                ?>

                <?php
                while ($data_atual->format('N') > 1) {
                    echo "<td></td>";
                    $data_atual->modify('+1 day');
                }
                ?>
            </tr>
        </tbody>
    </table>
    <a href="index.php" class="btn-voltar">Voltar para o início</a>
</body>
</html>
