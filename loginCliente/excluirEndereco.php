<?php
$servername = "localhost";
$usuario = "root";
$senha = "";
$dbname = "clinicaestetica";

$conn = new mysqli($servername, $usuario, $senha, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM enderecos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: visualizarEndereço.php");
        exit();
    } else {
        echo "Erro ao excluir o endereço: " . $conn->error;
    }
} else {
    echo "ID não fornecido.";
}

$conn->close();
?>
