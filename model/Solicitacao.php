<?php

    include 'Database.php';

    class Solicitacao extends Database {

        protected $id_solicitacao;
        protected $nome_solicitacao;
        protected $descricao_solicitacao;
        protected $data_solicitacao;
        protected $status_solicitacao;



        public function __construct($_nome_solicitacao, $_descricao_solicitacao){
            
            $this->nome_solicitacao = $_nome_solicitacao;
            $this->descricao_solicitacao = $_descricao_solicitacao;
            $this->data_solicitacao = date('Y-m-d H:i:s');
            $this->status_solicitacao = "Pendente";

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


    }



?>