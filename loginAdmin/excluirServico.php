<?php
    // Conectar ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "usuario_db";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Verificar se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servico = $_POST['servico']; // Recebe o nome do serviço que o usuário quer excluir

        // Preparar a consulta para verificar se o serviço existe
        $sql = "SELECT id FROM servicos WHERE servico = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $servico); // Bind do parâmetro para a consulta SQL
        $stmt->execute();
        $result = $stmt->get_result();

        // Se o serviço existir, exclui-o
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_servico = $row['id'];

            // Excluir o serviço
            $delete_sql = "DELETE FROM servicos WHERE id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("i", $id_servico); // Passa o id para excluir
            if ($delete_stmt->execute()) {
                echo "<p>Serviço '$servico' excluído com sucesso!</p>";
            } else {
                echo "<p>Erro ao excluir o serviço.</p>";
            }
        } else {
            echo "<p>Serviço não encontrado.</p>";
        }

        // Fechar a conexão
        $stmt->close();
        $delete_stmt->close();
    }

    // Fechar a conexão com o banco
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
