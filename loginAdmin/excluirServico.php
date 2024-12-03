<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "usuario_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servico = $_POST['servico'];

        $sql = "SELECT id FROM servicos WHERE servico = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $servico);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_servico = $row['id'];

            $delete_sql = "DELETE FROM servicos WHERE id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("i", $id_servico); 
            if ($delete_stmt->execute()) {
                echo "<p>Serviço '$servico' excluído com sucesso!</p>";
            } else {
                echo "<p>Erro ao excluir o serviço.</p>";
            }
        } else {
            echo "<p>Serviço não encontrado.</p>";
        }

        $stmt->close();
        $delete_stmt->close();
    }

    $conn->close();
    ?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="excluirServico.css" />
    <title>Excluir Serviço</title>
  </head>
  <body>
    <section>
    <form action="" method="post">
      <label for="servico">Excluir Serviço</label>
      <input type="text" id="servico" name="servico" required>
      <input type="submit" value="Excluir Serviço">
    </form>
    </section>
    <a href="./servicos.php"><button class="add-admin-btn" id="vbotao">Voltar</button></a>
  </body>
</html>
