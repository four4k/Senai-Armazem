<?php

    require 'conexao.class.php';
    include 'produto.class.php';


    interface IRepositorioProduto {
        public function cadastrarProduto($produto);
        public function removerProduto($produto);
        public function atualizarProduto($produto);
        public function buscarProduto($produto);
        public function getListarProduto();
    }

    class RepositorioProdutoSQL implements IRepositorioProduto {
        private $conexao;

        public function __construct(){
            $this->conexao = new Conexao("localhost", "locadora", "alunolab", "sistema");
            if ($this->conexao->conectar() == false) {
                echo "Erro" . myslqi_error();
            }
        }
    

        public function cadastrarProduto($produto) {
            $id_produto = $produto->getId_produto();
            $codigoProduto = $produto->getCodigoProduto();
            $nomeProduto = $produto->getNomeProduto();
            $codigoArmazem = $produto->getCodigoArmazem();
            $codigoEstante = $produto->getCodigoProduto();
            $codigoPrateleira = $produto->getCodigoPrateleira();
            $codigoPosicao = $produto->getCodigoPosicao();

            $sql = "INSERT INTO produto(codigo_produto, nome, codigo_armazem, codigo_estante, codigo_prateleira, codigo_posicao) 
            VALUES ('$codigoProduto', '$nomeProduto', '$codigoArmazem', '$codigoEstante', '$codigoPrateleira', '$codigoPosicao');";

            $this->conexao->executarQuery($sql);
        }

        public function removerProduto($id_aproduto) {
            $sql = "DELETE FROM produto WHERE id_produto = '$id_produto'";

            $this->conexao->executarQuery($sql);
        }

        public function atualizarProduto($produto) {
            $id_produto = $produto->getId_produto();
            $codigoProduto = $produto->getCodigoProduto();
            $nomeProduto = $produto->getNomeProduto();
            $codigoArmazem = $produto->getCodigoArmazem();
            $codigoEstante = $produto->getCodigoProduto();
            $codigoPrateleira = $produto->getCodigoPrateleira();
            $codigoPosicao = $produto->getCodigoPosicao();

            $sql = "UPDATE produto SET codigo_produto = '$codigoProduto', nome = '$nomeProduto', codigo_armazem = '$codigoArmazem', codigo_estante = '$codigoEstante', codigo_prateleira = '$codigoPrateleira', codigo_posicao = '$codigoPosicao' WHERE id_produto = '$id_produto'";

            $this->conexao->executarQuery($sql);
        }

        public function buscarProduto($id_produto) {
            $linha = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM produto WHERE id_produto = '$id_produto'");

            $produto = new Produto($linha['id_produto'], $linha['codigo_produto'], $linha['nome'], $linha['codigo_armazem'], $linha['codigo_estante'], $linha['codigo_prateleira'], $linha['codigo_posicao']);

            return $produto;
        }

        public function getListarProduto(){
            $listagem = $this->conexao->executarQuery("SELECT * FROM produto");

            $arrayProduto = array();

            while($linha = mysqli_fetch_array($listagem)) {
                $produto = new Produto($linha['id_produto'], $linha['codigo_produto'], $linha['nome'], $linha['codigo_armazem'], $linha['codigo_estante'], $linha['codigo_prateleira'], $linha['codigo_posicao']);

                array_push($arrayProduto, $produto);
            }

            return $arrayProduto;
        }
    }

    $repositorioProduto = new RepositorioProdutoSQL();
?>