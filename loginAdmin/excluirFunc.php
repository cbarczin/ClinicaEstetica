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
    $funcionario_nome = $_POST['funcionario_nome'];

    if (!empty($funcionario_nome)) {
        $sql = "DELETE FROM funcionarios WHERE nome = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $funcionario_nome);

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $mensagem = "Funcionário excluído com sucesso!";
                } else {
                    $mensagem = "Nenhum funcionário encontrado com o nome fornecido.";
                }
            } else {
                $mensagem = "Erro ao excluir funcionário: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $mensagem = "Erro na preparação da consulta: " . $conn->error;
        }
    } else {
        $mensagem = "Por favor, forneça o nome do funcionário a ser excluído!";
    }
}

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

