<?php

    require_once 'conexao.class.php';
    include 'posicao.class.php';

    interface IRepositorioposicao {
        public function cadastrarPosicao($posicao);
        public function removerPosicao($posicao);
        public function atualizarPosicao($posicao);
        public function buscarPosicao($posicao);
        public function getListarPosicao();
    }

    class RepositorioPosicaoSQL implements IRepositorioPosicao {
        private $conexao;

        public function __construct() {
            $this->conexao = new Conexao("localhost", "locadora", "alunolab", "sistema");
            if($this->conexao->conectar() == false) {
                echo "Erro" . myslqi_error();
            }
        }

        public function cadastrarPosicao($posicao) {
            $id_posicao = $posicao->getId_posicao();
            $codigo = $posicao->getCodigo();
            $id_prateleira = $posicao->getId_prateleira();

            $sql = "INSERT INTO posicao(id_posicao, codigo_posicao, id_prateleira) VALUES (NULL, '$codigo', '$id_prateleira')";

            $this->conexao->executarQuery($sql);
        }

        public function removerPosicao($id_posicao) {
            $sql = "DELETE FROM posicao WHERE id_posicao = '$id_posicao'";

            $this->conexao->executarQuery($sql);
        }

        public function atualizarPosicao($posicao) {
            $id_posicao = $posicao->getId_posicao();
            $codigo = $posicao->getCodigo();
            $id_prateleira = $posicao->getId_prateleira();

            $sql = "UPDATE posicao SET codigo_posicao = '$codigo', id_prateleira = '$id_prateleira' WHERE id_posicao = '$id_posicao'";

            $this->conexao->executarQuery($sql);
        }

        public function buscarPosicao($id_posicao) {
            $linha = $this->conexao->executarQuery("SELECT * FROM posicao WHERE id_posicao = '$id_posicao'");

            $posicao = new posicao($linha['id_posicao'], $linha['codigo_posicao'], $linha['id_prateleira']);

            return $posicao;
        }

        
        public function getListarPosicao(){
            $listagem = $this->conexao->executarQuery("SELECT * FROM posicao");

            $arrayposicao = array();

            while($linha = mysqli_fetch_array($listagem)) {
                $posicao = new posicao($linha['id_posicao'], $linha['codigo_posicao'], $linha['id_prateleira']);

                array_push($arrayposicao, $posicao);
            }

            return $arrayposicao;
        }
    }

    $repositorioPosicao = new RepositorioPosicaoSQL();
?>