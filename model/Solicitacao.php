<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    
    include 'Database.php';

    class Solicitacao extends Database {

        protected $id_solicitacao;
        protected $nome_solicitacao;
        protected $tipo_solicitacao;
        protected $descricao_solicitacao;
        protected $status_solicitacao = "Pendente";

        public function __construct($_nome_solicitacao, $_tipo_solicitacao, $_descricao_solicitacao){
            
            $this->nome_solicitacao = $_nome_solicitacao;
            $this->tipo_solicitacao = $_tipo_solicitacao;
            $this->descricao_solicitacao = $_descricao_solicitacao;


        }

        
        // METODO GET PARA ACESSO DE ATRIBUTOS
        public function __get($campo){
            if(property_exists($this,$campo)){
                return $this->$campo;
            }
        }


        // METODO SET PARA ATRIBUICAO DE ATRIBUTOS
        public function __set($campo,$_value){
            if(property_exists($this,$campo)){
                $this->$campo = $_value;
            }
        }

        // METODO PARA INSERIR SOLICITACAO NO BANCO DE DADOS
        public function inserirSolicitacao(){
            $conn = new mysqli('localhost', 'pedro', 'pedro123','prefeitura');
            // if ($conn->connect_error) {
            //     die("Erro na conexão: " . $conn->connect_error);
            // }
            
            $sql = "INSERT INTO solicitacoes (nome_solicitante, tipo_servico, descricao, data_solicitacao, status) 
            VALUES (?, ?, ?, NOW(), ?)";
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssss', $this->nome_solicitacao, $this->tipo_solicitacao, $this->descricao_solicitacao, $this->status_solicitacao);
            $stmt->execute();

        }


    }



?>