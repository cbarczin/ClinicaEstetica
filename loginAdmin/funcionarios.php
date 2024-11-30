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

// Consultar todos os funcionários
$sql = "SELECT id, nome FROM funcionarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Funcionários</title>
    <link rel="stylesheet" href="styleFunc.css" />
</head>
<body>
    <header>
        <h1 class="admin-title">Área do Administrador</h1>
        <section class="user-info">
            <p>ADMINISTRADOR LOGADO:</p>
            <p class="user-name">FRANCISCO</p>
        </section>
        <nav class="menu">
            <a href="./administradores.html"><button>Administradores</button></a>
            <a href="./funcionarios.php"><button class="active">Funcionários</button></a>
            <a href="./servicos.php"><button>Serviços</button></a>
            <a href="./financas.html"><button>Finanças</button></a>
        </nav>
    </header>

    <main class="content">
        <section class="admin-cards">
            <?php
            // Verificar se há resultados
            if ($result->num_rows > 0) {
                // Gerar um cartão para cada funcionário
                while($row = $result->fetch_assoc()) {
                    echo '<div class="admin-card">';
                    echo '<p>' . $row['nome'] . '</p>';
                    // Formulário para enviar ID via POST
                    echo '<form method="POST" action="verPerfil.php">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<button class="profile-btn" type="submit">Ver Perfil</button>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo "Nenhum funcionário encontrado.";
            }
            ?>
        </section>
        <div style="width: 55%;">
            <button class="add-admin-btn" onclick="window.location.href='./adicionarFunc.php'">Cadastro de Funcionários</button>
            <button  style="width: 23%; background-color: #fc6a6a;" class="add-admin-btn" onclick="window.location.href='./excluirFunc.php'">Excluir Funcionários</button>
        </div>
    </main>

    <footer>
        <p class="warning">
            TOME CUIDADO AO SE CONECTAR A REDES SEM FIO PÚBLICAS<br />
            DESCONECTE SUA CONTA INSTITUCIONAL AO TERMINAR SEUS AFAZERES
        </p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
