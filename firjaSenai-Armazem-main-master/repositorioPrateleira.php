<?php

    require_once 'conexao.class.php';
    include 'prateleira.class.php';

    interface IRepositorioPrateleira {
        public function cadastrarPrateleira($prateleira);
        public function removerPrateleira($parteleira);
        public function atualizarPrateleira($prateleira);
        public function buscarPrateleira($prateleira);
        public function getListarPrateleira();
    }

    class RepositorioPrateleiraSQL implements IRepositorioPrateleira {
        private $conexao;

        public function __construct() {
            $this->conexao = new Conexao("localhost", "locadora", "alunolab", "sistema");
            if($this->conexao->conectar() == false) {
                echo "Erro" . myslqi_error();
            }
        }

        public function cadastrarPrateleira($prateleira) {
            $id_prateleira = $prateleira->getId_prateleira();
            $codigo = $prateleira->getCodigo();
            $id_estante = $prateleira->getId_estante();

            $sql = "INSERT INTO prateleira(id_prateleira, codigo_prateleira, id_estante) VALUES (NULL, '$codigo', '$id_estante')";

            $this->conexao->executarQuery($sql);
        }

        public function removerPrateleira($id_prateleira) {
            $sql = "DELETE FROM prateleira WHERE id_prateleira = '$id_prateleira'";

            $this->conexao->executarQuery($sql);
        }

        public function atualizarPrateleira($prateleira) {
            $id_prateleira = $prateleira->getId_prateleira();
            $codigo = $prateleira->getCodigo();
            $id_estante = $prateleira->getId_estante();

            $sql = "UPDATE prateleira SET codigo_prateleira = '$codigo', id_estante = '$id_estante' WHERE id_prateleira = '$id_prateleira'";

            $this->conexao->executarQuery($sql);
        }

        public function buscarPrateleira($id_prateleira) {
            $linha = $this->conexao->executarQuery("SELECT * FROM prateleira WHERE id_prateleira = '$id_prateleira'");

            $prateleira = new Prateleira($linha['id_prateleira'], $linha['codigo_prateleira'], $linha['id_estante']);

            return $prateleira;
        }

        
        public function getListarPrateleira(){
            $listagem = $this->conexao->executarQuery("SELECT * FROM prateleira");

            $arrayPrateleira = array();

            while($linha = mysqli_fetch_array($listagem)) {
                $prateleira = new Prateleira($linha['id_prateleira'], $linha['codigo_prateleira'], $linha['id_estante']);

                array_push($arrayPrateleira, $prateleira);
            }

            return $arrayPrateleira;
        }
    }

    $repositorioPrateleira = new RepositorioPrateleiraSQL();
?>