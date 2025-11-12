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

// Executa exclusão de todos os registros
$sql = "DELETE FROM dados";
if (mysqli_query($conn, $sql)) {
    resposta('sucesso', 'Todos os usuários foram excluídos com sucesso!');
} else {
    resposta('erro', 'Falha ao excluir usuários.', ['mysqli_error' => mysqli_error($conn)]);
}

$conn->close();
?>
