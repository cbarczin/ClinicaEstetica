<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario_db";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Variável para armazenar a mensagem
$mensagem = "";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servico = $_POST['servico']; // Recebe o nome do serviço que o usuário quer adicionar

    // Verificar se o nome do serviço foi fornecido
    if (!empty($servico)) {
        // Preparar a consulta para inserir o novo serviço
        $sql = "INSERT INTO servicos (servico) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $servico); // Bind do parâmetro para a consulta SQL
        
        // Executar a consulta
        if ($stmt->execute()) {
            $mensagem = "Serviço '$servico' adicionado com sucesso!";
        } else {
            $mensagem = "Erro ao adicionar serviço: " . $stmt->error;
        }

        // Fechar a declaração
        $stmt->close();
    } else {
        $mensagem = "Por favor, forneça o nome do serviço!";
    }
}

// Fechar a conexão com o banco
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
