<?php
// Conectar ao banco de dados
$servername = "localhost";
$usuario = "root";
$senha = "";
$dbname = "clinicaestetica";

$conn = new mysqli($servername, $usuario, $senha, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verificar se o ID do endereço foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para excluir o endereço
    $sql = "DELETE FROM enderecos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página de visualização de endereços após exclusão
        header("Location: visualizarEndereço.php");
        exit();
    } else {
        echo "Erro ao excluir o endereço: " . $conn->error;
    }
} else {
    echo "ID não fornecido.";
}

// Fechar a conexão
$conn->close();
?>
