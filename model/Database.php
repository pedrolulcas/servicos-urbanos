<?php

    class Database{

        public $hostname;
        public $username;
        public $password;
        public $dbname = 'prefeitura';

        public function __construct($_hostname, $_username, $_password){

            $this->hostname = $_hostname;
            $this->username = $_username;
            $this->password = $_password;
        }

        public function construirDatabase(){

            $conn = new mysqli($this->hostname, $this->username, $this->password);
            if ($conn->connect_error) {
                die("Erro na conexão: " . $conn->connect_error);
            }
            
            $sql = "CREATE DATABASE IF NOT EXISTS prefeitura";
            $conn->query($sql);

            $conn->select_db('prefeitura');

            $sql = "CREATE TABLE IF NOT EXISTS solicitacoes (

                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nome_solicitante VARCHAR(100) NOT NULL,
                tipo_servico VARCHAR(100) NOT NULL,
                descricao TEXT NOT NULL, 
                data_solicitacao DATETIME DEFAULT CURRENT_TIMESTAMP,
                status VARCHAR(20) NOT NULL
            )";

            $conn->query($sql);
            $conn->close();

        }
    }


?>