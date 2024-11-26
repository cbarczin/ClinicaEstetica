<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$mensagem = ""; // Para exibir a mensagem ao usuário

// Defina o ID fixo como 1
$id = 1; 

// Verifica se os dados do formulário foram enviados corretamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nome'], $_POST['inscricao'], $_POST['rel'], $_POST['salario'])) {
        $nome = $_POST['nome'];
        $inscricao = $_POST['inscricao'];
        $rel = $_POST['rel'];
        $salario = $_POST['salario'];

        // Validações simples
        if (empty($nome) || empty($inscricao) || empty($rel) || empty($salario)) {
            $mensagem = "Todos os campos são obrigatórios.";
        } elseif (!is_numeric($salario)) {
            $mensagem = "O salário deve ser um número válido.";
        } else {
            // Prepara a instrução SQL com prepared statements
            $stmt = $conn->prepare("UPDATE admin SET nome=?, inscricao=?, rel=?, salario=? WHERE id=?");
            $stmt->bind_param("ssidi", $nome, $inscricao, $rel, $salario, $id); // Altere para "idi" para tratar o salário como número (double/integer)

            // Executa a consulta
            if ($stmt->execute()) {
                $mensagem = "Registro atualizado com sucesso!";
            } else {
                $mensagem = "Erro ao atualizar registro: " . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        $mensagem = "Dados do formulário inválidos.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./editarDadosAdmin.css">
    <title>Clinica Estetica</title>
</head>
<body>
    <main>
        <section>
            <form action="" method="post">
                <h2>Altere os dados desejados!</h2>
                <label for="nome">Nome: </label>    
                <input type="text" id="nome" name="nome">
                <br>
                <label for="inscri">Data de Inscrição: </label>
                <input type="date" id="inscri" name="inscricao">
                <br>
                <label for="rel">Relatórios: </label>
                <input type="number" id="rel" name="rel">
                <br>
                <label for="sal">Salário:</label>
                <input type="number" id="sal" name="salario">
                <br>
                <div style="width: 100%; display: flex; justify-content: center; position: relative; left: 0;">
                <a width="2%" href="./administradorFrancisco.php"><img width="25%" src="../images/setavoltar.png" alt="FODASE"></a>
                <input type="submit" value="Atualizar" id="enviar">
                </div>
                <?php if (!empty($mensagem)): ?>
                    <p><?php echo $mensagem; ?></p>
                <?php endif; ?>
            </form>
        </section>
    </main>
</body>
</html>
