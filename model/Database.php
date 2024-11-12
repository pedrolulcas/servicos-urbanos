<?php


    class Database{

        private $hostname;
        private $username;
        private $password;
        private $dbname;
        private $conn = null;

        public function __construct($_hostname, $_username, $_password, $_dbname){

            $this->hostname = $_hostname;
            $this->username = $_username;
            $this->password = $_password;
            $this->dbname = $_dbname;
        }
    
        public function conectar(){
    
            if($this->conn === null){
                $this->conn = new mysqli($this->hostname,$this->username,$this->password);
        
                if($this->conn->connect_error){
                    die("Erro na conexão: " . $this->conn->connect_error);
                }
            }
    
            return $this->conn;
        }

        public function getDbname(){
            return $this->dbname;
        }
    
    }





?>