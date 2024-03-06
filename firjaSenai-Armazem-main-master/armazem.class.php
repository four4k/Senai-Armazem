<?php 

    class Armazem {
        private $id_armazem;
        private $codigo;
        private $nome;

        function __construct($id_armazem,  $codigo, $nome){
            $this->id_armazem = $id_armazem;
            $this->codigo = $codigo;
            $this->nome = $nome;
        }

        public function getId_armazem(){
            return $this->id_armazem;
        }
        public function setId_armazem($id_armazem){
            $this->id_armazem = $id_armazem;

        }

        public function getCodigo(){
            return $this->codigo;
        }
        public function setCodigo($cogdigo){
            $this->codigo = $codigo;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
    }
?>