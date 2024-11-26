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
    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $servicos = $_POST['servicos'];
    $horarios = $_POST['horarios'];
    $dias = $_POST['dias'];
    $salario = $_POST['salario'];

    // Validar campos não vazios
    if (!empty($nome) && !empty($contato) && !empty($servicos) && !empty($horarios) && !empty($dias) && !empty($salario)) {
        // Preparar a consulta SQL para inserir o novo funcionário
        $sql = "INSERT INTO funcionarios (nome, contato, servicos, horarios, dias, salario)
                VALUES (?, ?, ?, ?, ?, ?)";

        // Preparar a consulta
        if ($stmt = $conn->prepare($sql)) {
            // Vincular os parâmetros à consulta
            $stmt->bind_param("sssssd", $nome, $contato, $servicos, $horarios, $dias, $salario);

            // Executar a consulta
            if ($stmt->execute()) {
                $mensagem = "Novo funcionário cadastrado com sucesso!";
            } else {
                $mensagem = "Erro ao cadastrar funcionário: " . $stmt->error;
            }

            // Fechar a declaração
            $stmt->close();
        } else {
            $mensagem = "Erro na preparação da consulta: " . $conn->error;
        }
    } else {
        $mensagem = "Por favor, preencha todos os campos!";
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
    <title>Cadastro de Funcionário</title>
</head>
<body>
    <main>
        <section>
            <form action="" method="post">
                <h2>Cadastre um novo funcionário</h2>
                <label for="nome">Nome: </label>    
                <input type="text" id="nome" name="nome" required>
                <br>

                <label for="contato">Contato: </label>
                <input type="text" id="contato" name="contato" required>
                <br>

                <label for="servicos">Serviço: </label>
                <input type="text" id="servicos" name="servicos" required>
                <br>

                <label for="horarios">Horários: </label>
                <input type="text" id="horarios" name="horarios" required>
                <br>

                <label for="dias">Dias: </label>
                <input type="text" id="dias" name="dias" required>
                <br>

                <label for="salario">Salário: </label>
                <input type="number" id="salario" name="salario" required>
                <br>

                <div style="width: 100%; display: flex; justify-content: center; position: relative; left: 0;">
                    <a width="2%" href="./funcionarios.php">
                        <img width="25%" src="../images/setavoltar.png" alt="Voltar">
                    </a>
                    <input type="submit" value="Cadastrar" id="enviar">
                </div>

                <?php if (!empty($mensagem)): ?>
                    <p><?php echo $mensagem; ?></p>
                <?php endif; ?>
            </form>
        </section>
    </main>
</body>
</html>
