<?php
$host = 'localhost';
$dbname = 'clinicaestetica';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario_id = $_POST['usuario_id'] ?? null;
        $data = $_POST['data'] ?? null;
        $hora = $_POST['hora'] ?? null;
        $servico = $_POST['servico'] ?? null;
        $valor = $_POST['valor'] ?? null;

        if (!$usuario_id || !$data || !$hora || !$servico || !$valor) {
            die(json_encode(['error' => 'Todos os campos são obrigatórios.']));
        }

        if (!preg_match('/^\d{2}:\d{2}:\d{2}$/', $hora)) {
            if (preg_match('/^\d{1,2}h$/', $hora)) {
                $hora = str_replace('h', ':00:00', $hora);
            } else {
                die(json_encode(['error' => 'Formato de hora inválido.']));
            }
        }

        $stmt = $pdo->prepare("
            INSERT INTO agendamentos (usuario_id, data, hora, servico, valor) 
            VALUES (:usuario_id, :data, :hora, :servico, :valor)
        ");
        $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':data' => $data,
            ':hora' => $hora,
            ':servico' => $servico,
            ':valor' => $valor,
        ]);

        header('Location: /clinicaestetica/loginCliente/meusAgendamentos.php');
        exit;
    } else {
        die(json_encode(['error' => 'Método inválido.']));
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
