<?php
session_start();
header('Content-Type: application/json');
include 'conexao.php';

// Habilitar exibição de erros apenas para debug (remova depois)
ini_set('display_errors', 1);
error_reporting(E_ALL);

function resposta($status, $mensagem, $extra = []) {
    echo json_encode(array_merge(['status' => $status, 'mensagem' => $mensagem], $extra));
    exit;
}

// --- Verificações básicas ---
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    resposta('erro', 'Método inválido. Use POST.');
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
if ($id <= 0) {
    resposta('erro', 'ID inválido ou não informado.');
}

// Impedir exclusão de si mesmo (removido pois não há sessão válida)

// Verifica se o registro existe
$check = $conn->prepare("SELECT id FROM dados WHERE id = ?");
$check->bind_param('i', $id);
$check->execute();
$result = $check->get_result();
if ($result->num_rows === 0) {
    resposta('erro', 'Usuário não encontrado no banco de dados.');
}
$check->close();

// Executa exclusão
$stmt = $conn->prepare("DELETE FROM dados WHERE id = ?");
$stmt->bind_param('i', $id);
if ($stmt->execute()) {
    resposta('sucesso', 'Usuário excluído com sucesso!');
} else {
    resposta('erro', 'Falha ao excluir usuário.', ['mysqli_error' => $conn->error]);
}
$stmt->close();
$conn->close();


?>