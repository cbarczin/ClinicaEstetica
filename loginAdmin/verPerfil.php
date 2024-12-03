<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT nome, contato, salario, servicos, dias, horarios
            FROM funcionarios
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $contato = $row['contato'];
        $salario = $row['salario'];
        $servicos = $row['servicos'];
        $dias = $row['dias'];
        $horarios = $row['horarios'];
    } else {
        echo "Funcionário não encontrado.";
        exit;
    }
} else {
    echo "ID não fornecido!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="adicionarFunc.css">
    <title>Perfil do Funcionário</title>
</head>
<body>
    <section style="height: 60vh; text-align: center; font-color: #8d5b77;">
    <h2>Perfil do Funcionário</h2>
    <p><strong>Nome:</strong> <?php echo $nome; ?></p>
    <p><strong>Contato:</strong> <?php echo $contato; ?></p>
    <p><strong>Salário: R$</strong> <?php echo $salario; ?></p>
    <p><strong>Serviço(s):</strong> <?php echo $servicos; ?></p>
    <p><strong>Dias de Trabalho:</strong> <?php echo $dias; ?></p>
    <p><strong>Horários de Trabalho:</strong> <?php echo $horarios; ?></p>
    </section>
    <a href="funcionarios.php"><button class="add-admin-btn">Voltar</button></a>
</body>
</html>

<?php
$conn->close();
?>
