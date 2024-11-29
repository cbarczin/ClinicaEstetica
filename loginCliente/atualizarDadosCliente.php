<?php
// Conexão com o banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "clinicaestetica";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
  die("Erro de conexão: " . $conexao->connect_error);
}

// Pega os dados do formulário
$id_cliente = 1; // Alterar conforme necessário (pode ser dinâmico, por exemplo: $_SESSION['id'] ou $_GET['id'])
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];
$telefone = $_POST['telefone'];
$genero = $_POST['genero'];

// Consulta SQL para atualizar os dados
$sql = "UPDATE cliente SET 
          nome = ?, 
          sobrenome = ?, 
          email = ?, 
          cpf = ?, 
          data_nascimento = ?, 
          telefone = ?, 
          genero = ? 
        WHERE id = ?";

// Prepara e executa a consulta
$stmt = $conexao->prepare($sql);
$stmt->bind_param("sssssssi", $nome, $sobrenome, $email, $cpf, $data_nascimento, $telefone, $genero, $id_cliente);

if ($stmt->execute()) {
  echo "Dados atualizados com sucesso!";
  header("Location: dadosCliente.php"); // Redireciona para a página de dados após a atualização
} else {
  echo "Erro ao atualizar os dados: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>
