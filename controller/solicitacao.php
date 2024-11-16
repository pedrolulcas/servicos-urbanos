<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include '../model/Solicitacao.php';

    $data = [
        'nome_solicitacao' => $_POST['name'],
        'tipo_solicitacao' => $_POST['tipo'],
        'descricao_solicitacao' => $_POST['desc'],
    ];

    
    $db = new Database('localhost','pedro','pedro123');
    $db->construirDatabase();

    $nsoli = new Solicitacao($_POST['name'], $_POST['tipo'], $_POST['desc']);
    $nsoli->inserirSolicitacao();


    


