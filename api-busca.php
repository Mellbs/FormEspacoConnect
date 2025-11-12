<?php

    $busca = $_GET ["usuario"];

    $conn = mysqli_connect("localhost", "root", "", "formulario");

    if(!$conn){
        http_response_code(500);
        die(json_enconde(['erro'=>'erro de conexão com o banco de dados'.mysqli_connect_error()]));
    }

    else{
    $sql = "SELECT id, nome, data, classificacao, turma FROM dados where nome like '%".$busca."%'";

    }

    $result = mysqli_query($conn, $sql);
    $usuarios = [];

    if($result){
        while($row = $result -> fetch_assoc()){
            $usuarios[] = $row;
        }
    }

    else{
        http_response_code(500);
        die(json_econde(['erro'=>'erro de conexão com o banco de dados'.mysqli_connect_error()]));
    }

    echo json_encode($usuarios);