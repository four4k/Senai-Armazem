<?php 
    class Produto{

        private $id_produto;
        private $codigoProduto;
        private $nomeProduto;
        private $codigoArmazem;
        private $codigoEstante;
        private $codigoPrateleira;
        private $codigoPosicao;
        
        


        public function __construct($id_produto, $codigoProduto, $nomeProduto, $codigoArmazem, $codigoEstante, $codigoPrateleira, $codigoPosicao){
                        
            $this->id_produto = $id_produto;          
            $this->codigoProduto = $codigoProduto;
            $this->nomeProduto = $nomeProduto;
            $this->codigoArmazem = $codigoArmazem;
            $this->codigoEstante = $codigoEstante;
            $this->codigoPrateleira = $codigoPrateleira;
            $this->codigoPosicao = $codigoPosicao;

        }

        public function setId_produto($novoId){
            $this->id_produto = $novoId;
        }
        public function getId_produto(){
            return $this->id_produto;
        }

        public function setCodigoProduto($novoCodigo){
            $this->codigoProduto = $novoCodigo;
        }
        public function getCodigoProduto(){
            return $this->codigoProduto;
        }

        public function setNomeProduto($novoNome){
            $this->nomeProduto = $novoNome;
        }
        public function getNomeProduto(){
            return $this->nomeProduto;
        }

        public function setCodigoArmazem($novoArmazem){
            $this->codigoArmazem = $novoArmazem;
        }
        public function getCodigoArmazem(){
            return $this->codigoArmazem;
        }

        public function setCodigoEstante($novoEstante){
            $this->codigoEstante = $novoEstante;
        }
        public function getCodigoEstante(){
            return $this->codigoEstante;
        }

        public function setCodigoPrateleira($novoPrateleira){
            $this->codigoPrateleira= $novoPateleira;
        }
        public function getCodigoPrateleira(){
            return $this->codigoPrateleira;
        }

        public function setCodigoPosicao($novoPosicao){
            $this->codigoPosicao = $novoPosicao;
        }
        public function getCodigoPosicao(){
            return $this->codigoPosicao;
        }
    }
?>