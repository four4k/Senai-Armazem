<?php

    class Estante {
        private $id_estante; 
        private $codigo;
        private $id_armazem;

        function __construct($id_estante, $codigo, $id_armazem) {
            $this->id_estante = $id_estante;
            $this->codigo = $codigo;
            $this->id_armazem = $id_armazem; 
            
        }

        public function getId_estante(){ 
            return $this->id_estante;
        }
        public function setId_estante($id_estante){ 
            $this->id_estante = $id_estante;

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
        public function setCodigo($codigo){ 
            $this->codigo = $codigo;
        }
    }

        
?>  