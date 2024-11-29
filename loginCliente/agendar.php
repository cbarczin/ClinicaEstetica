<?php
// Configuração do banco de dados
$host = 'localhost';
$dbname = 'clinicaestetica';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebe os dados enviados via POST
    $data = json_decode(file_get_contents('php://input'), true);

    // Insere os dados na tabela
    $stmt = $pdo->prepare("INSERT INTO agendamentos (usuario_id, data, hora, servico, valor) VALUES (:usuario_id, :data, :hora, :servico, :valor)");
    $stmt->execute([
        ':usuario_id' => $data['usuario_id'],
        ':data' => $data['data'],
        ':hora' => $data['hora'],
        ':servico' => $data['servico'],
        ':valor' => $data['valor'],
    ]);

    http_response_code(200);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
