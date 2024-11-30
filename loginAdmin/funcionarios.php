<?php
// Conectar ao banco de dados (substitua as credenciais abaixo pelos seus dados)
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
$sql = "SELECT nome FROM funcionarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administradores</title>
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
        <a href="./funcionarios.html"><button class="active">Funcionários</button></a>   
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
                echo '<button class="profile-btn">Ver Perfil</button>';
                echo '</div>';
            }
        } else {
            echo "Nenhum administrador encontrado.";
        }
        ?>
      </section>
      <div style="width: 55%;">
      <button class="add-admin-btn" onclick="window.location.href='./adicionarFunc.php'">Cadastro de Funcionarios</button>
      <button  style="width: 23%; background-color: #fc6a6a;"class="add-admin-btn" onclick="window.location.href='./excluirFunc.php'">Excluir Funcionarios</button>
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