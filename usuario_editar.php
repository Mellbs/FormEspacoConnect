<?php

    session_start();
    header('Content-Type: application/json');
    include 'conexao.php';

    $id = $_POST['id'] ?? 0;
    $nome = $_POST['nome'] ?? '';
    $data = $_POST['data'] ?? '';
    $classificacao = $_POST['classificacao'] ?? '';
    $turma = $_POST['turma'] ?? '';


    if(!$id || !$nome || !$data || !$classificacao || !$turma) {
        echo json_encode([
            'status' => 'erro',
            'mensagem' => 'Preencha todos os campos obrigatórios'
        ]);
        exit;
    }

    $update = "UPDATE dados SET nome = '$nome', data = '$data', classificacao = '$classificacao', turma = '$turma'";

    $update .= "WHERE id = $id";

    if(mysqli_query($conn, $update)) {
        echo json_encode([
            'status' => 'sucesso',
            'mensagem' => 'Usuário atualizado com sucesso'
        ]);
    }

    else {
        echo json_encode([
            'status' => 'erro',
            'mensagem' => 'Erro ao atualizar o usuário'
        ]);
    }

?>