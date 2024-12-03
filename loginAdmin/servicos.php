<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuario_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

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
        if ($result->num_rows > 0) {
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
      <div style="width: 50%;">
      <button  class="add-admin-btn" onclick="window.location.href='adicionarServico.php';">Adicionar Serviço</button>
      <button  style="width: 19%; background-color: #fc6a6a;" class="add-admin-btn" onclick="window.location.href='excluirServico.php';">Excluir Serviço</button>
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
