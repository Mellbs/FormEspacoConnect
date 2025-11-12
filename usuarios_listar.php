<?php

session_start();
header('Content-Type: application/json');
include 'conexao.php';


$sql = "SELECT id, nome, data, classificacao, turma FROM dados";
$res = mysqli_query($conn, $sql);

$usuarios = [];
while ($row = mysqli_fetch_assoc($res)){
    $usuarios[] = $row;
}

echo json_encode($usuarios);
?>