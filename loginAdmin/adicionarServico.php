<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servico = $_POST['servico']; 

    if (!empty($servico)) {
        $sql = "INSERT INTO servicos (servico) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $servico);
        
        if ($stmt->execute()) {
            $mensagem = "Serviço '$servico' adicionado com sucesso!";
        } else {
            $mensagem = "Erro ao adicionar serviço: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $mensagem = "Por favor, forneça o nome do serviço!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="adicionarServico.css" />
    <title>Adicionar Serviço</title>
    </head>
    <body>
        <section>
        <form action="" method="post">
        <label>Adicionar Serviço</label>
        <input type="text" id="servico" name="servico" required>
        <input type="submit" value="Adicionar Serviço" id="enviar">
        </form>
        </section>
        <?php if (!empty($mensagem)): ?>
            <p><?php echo $mensagem; ?></p>
        <?php endif; ?>
        <a href="./servicos.php"><button class="add-admin-btn" id="vbotao">Voltar</button></a>
    </body>
</html>
