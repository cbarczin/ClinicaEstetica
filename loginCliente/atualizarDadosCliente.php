<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "clinicaestetica";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
  die("Erro de conexão: " . $conexao->connect_error);
}

$id_cliente = 1; 
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];
$telefone = $_POST['telefone'];
$genero = $_POST['genero'];

$sql = "UPDATE cliente SET 
          nome = ?, 
          sobrenome = ?, 
          email = ?, 
          cpf = ?, 
          data_nascimento = ?, 
          telefone = ?, 
          genero = ? 
        WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("sssssssi", $nome, $sobrenome, $email, $cpf, $data_nascimento, $telefone, $genero, $id_cliente);

if ($stmt->execute()) {
  echo "Dados atualizados com sucesso!";
  header("Location: dadosCliente.php"); 
} else {
  echo "Erro ao atualizar os dados: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>
