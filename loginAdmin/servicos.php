<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario_db";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultar todos os serviços
$sql = "SELECT servico FROM servicos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administradores</title>
    <link rel="stylesheet" href="styleServicos.css" />
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
        <a href="./funcionarios.php"><button>Funcionários</button></a>   
        <a href="./servicos.html"><button class="active">Serviços</button></a> 
        <a href="./financas.html"><button>Finanças</button></a>  
      </nav>
    </header>

    <main class="content">
      <section class="admin-cards">
        <?php
        // Verificar se há resultados
        if ($result->num_rows > 0) {
            // Gerar um cartão para cada serviço
            while($row = $result->fetch_assoc()) {
                echo '<div class="admin-card">';
                echo '<p>' . $row['servico'] . '</p>';
                echo '<button class="profile-btn">Ver Serviços</button>';
                echo '</div>';
            }
        } else {
            echo "<p>Nenhum serviço encontrado.</p>";
        }
        ?>
      </section>
      <button  class="add-admin-btn" onclick="window.location.href='excluirServico.php';">Excluir Serviço</button>
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
// Fechar a conexão
$conn->close();
?>
