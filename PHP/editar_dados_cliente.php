<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "nome_do_seu_banco";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$genero = $_POST['genero'];
$telefone = $_POST['telefone'];
$data_nascimento = $_POST['data_nascimento'];

$cliente_id = 1;

$sql = "UPDATE clientes 
        SET nome = ?, sobrenome = ?, email = ?, cpf = ?, genero = ?, telefone = ?, data_nascimento = ?
        WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("sssssssi", $nome, $sobrenome, $email, $cpf, $genero, $telefone, $data_nascimento, $cliente_id);

if ($stmt->execute()) {
    echo "Dados atualizados com sucesso!";
} else {
    echo "Erro ao atualizar: " . $conexao->error;
}

$stmt->close();
$conexao->close();
?>
