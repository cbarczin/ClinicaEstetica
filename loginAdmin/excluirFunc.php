<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Variável para armazenar a mensagem
$mensagem = "";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber o nome do funcionário a ser excluído
    $funcionario_nome = $_POST['funcionario_nome'];

    // Validar se o nome foi informado
    if (!empty($funcionario_nome)) {
        // Preparar a consulta SQL para excluir o funcionário pelo nome
        $sql = "DELETE FROM funcionarios WHERE nome = ?";

        // Preparar a consulta
        if ($stmt = $conn->prepare($sql)) {
            // Vincular o parâmetro à consulta
            $stmt->bind_param("s", $funcionario_nome); // 's' indica string

            // Executar a consulta
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $mensagem = "Funcionário excluído com sucesso!";
                } else {
                    $mensagem = "Nenhum funcionário encontrado com o nome fornecido.";
                }
            } else {
                $mensagem = "Erro ao excluir funcionário: " . $stmt->error;
            }

            // Fechar a declaração
            $stmt->close();
        } else {
            $mensagem = "Erro na preparação da consulta: " . $conn->error;
        }
    } else {
        $mensagem = "Por favor, forneça o nome do funcionário a ser excluído!";
    }
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./adicionarFunc.css">
    <title>Excluir Funcionário</title>
</head>
<body>
    <section>
    <form action="" method="post">
    <label>Excluir Funcionário</label>
    <input type="text" id="funcionario_nome" name="funcionario_nome" placeholder="Nome" required>
    <input type="submit" value="Excluir" id="enviar">
        <?php if (!empty($mensagem)): ?>
        <p><?php echo $mensagem; ?></p>
        <?php endif; ?>
        </form>
        </section>
        <a href="./funcionarios.php"><button class="add-admin-btn" id="vbotao">Voltar</button></a>
</body>
</html>

