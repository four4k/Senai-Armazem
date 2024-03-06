<?php

    class Prateleira {
        private $id_prateleira;
        private $codigo;
        private $id_estante;

        function __construct($id_prateleira, $codigo, $id_estante) {
            $this->id_prateleira = $id_prateleira;
            $this->codigo = $codigo;
            $this->id_estante = $id_estante;
        }

        public function setId_prateleira($id_prateleira) {
            $this->id_prateleira = $id_prateleira;
        }
        public function getId_prateleira() {
            return $this->id_prateleira;
        }

        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }
        public function getCodigo() {
            return $this->codigo;
        }
        
        public function setId_estante($id_estante) {
            $this->id_estante = $id_estante;
        }
        public function getId_estante() {
            return $this->id_estante;
        }
    }
?>