<?php

    session_start();
    header('Content-Type: application/json');
    include 'conexao.php';

    $nome = $_POST['nome'] ?? '';
    $data = $_POST['data'] ?? '';
    $classificacao = $_POST['classificacao'] ?? '';
    $turma = $_POST['turma'] ?? '';

    if(!$nome || !$data || !$classificacao || !$turma){
        echo json_encode([
            'status' => 'erro',
            'mensagem' => 'Preencha todos os campos!'
        ]);
        exit;
    }

    $sql = "INSERT INTO dados (nome, data, classificacao, turma) VALUES ('$nome', '$data', '$classificacao', '$turma')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode([
            'status' => 'sucesso',
            'mensagem' => 'Usuário cadastrado com sucesso!'
        ]);
    }

    else {
        echo json_encode([
            'status' => 'erro',
            'mensagem' => 'Erro ao adicionar usuário.'
        ]);
    }

    ?>
