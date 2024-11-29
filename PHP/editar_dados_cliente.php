<?php
// Conexão com o banco de dados
$host = "localhost";
$usuario = "root";
$senha = ""; // Substitua pela senha do seu banco
$banco = "nome_do_seu_banco";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Receber os dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$genero = $_POST['genero'];
$telefone = $_POST['telefone'];
$data_nascimento = $_POST['data_nascimento'];

// Exemplo: Atualizar os dados do cliente com ID 1 (pode ser dinâmico)
$cliente_id = 1; // Substitua pelo ID do cliente atual

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
